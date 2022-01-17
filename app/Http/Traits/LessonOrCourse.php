<?php


namespace App\Http\Traits;

use App\Models\Course;
use App\Models\Events;
use App\Models\Lesson;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use App\Models\Files;

trait LessonOrCourse
{

    public static function createOrUpdate(object $request, Model $model, object $stripe = null): object
    {
        $table = $model->getTable();
        // data structure
        $data = [
            'title' => $request->title,
            'description' => $request->description,
            'instructor_id' => $request->instructor_id,
            'content' => $request->content,
            'slug' => $request->title,
            'online' => $request->preference_id == 1 ? true : false,
            'city_id' => $request->city_id,
            'stripe_id' => $stripe->id ?? null,
        ];
        if ($request->type === 'lesson')
            $data += ['start' => $request->start];

        // check if exists the price
        if ($request->price)
            $data += ['price' => $request->price,];

        //check if  request type is course or experience
        if ($request->type === 'course' || $request->type === 'experience')
            $data += ['type' => $request->type,];

        // update or create new resource with eloquent
        $response =  $model::updateOrCreate(['id' => $model->id], $data);

        // verify, create or update related tags
        if (isset($request->tag))
            $response->tags()->sync($request->tag);

        // check if the request contains a course and check if same the table name lessons
        if (isset($request->course) && $table == 'lessons') {
            // decode json and convert json to object
            $course = (object)json_decode($request->course);
            //access to relation and attach data
            $response->courses()->attach($course->id);
        }

        // store file
        if($request->event) self::storeEvent($request, $response);
        //store events
        self::storeFile($request, $response);
        //store extas
       if($request->extra) self::storeExtas($request, $response);
        //object
        return $response;
    }

    public static function storeExtas(object $request, Model $response)
    {
        $countExtras = count($request->extra['title']);
        $params = self::arrayFormat($request->extra, $countExtras);
        $folder = "$request->type-$response->id/";
        $subFolder = 'extras';
        foreach ($params as $param) {
            $file = $param['file'];
            $extra = $file->store($folder . $subFolder, 'public');

            $response->files()->updateOrCreate([
                'id' => $param['id'] ?? null,
                'type' => 'extra'
            ],  [
                'type' => 'extra',
                'file' => $extra,
                'title' => $param['title']
            ]);
        }

        return true;
    }
    public static function storeEvent(object $request, Model $response)
    {
        $howManyEvents = count($request->event['title']);

        $params = self::arrayFormat($request->event, $howManyEvents);

        foreach ($params as $values) {
            $response->events()->updateOrCreate(
                [
                    'id' => $values['id'] ?? null
                ],
                $values
            );
        }
    }

    protected static function arrayFormat(array $arr, int $howMany): array
    {
        $result = [];
        for ($i = 0; $i < $howMany; $i++) {
            foreach ($arr as $key => $value) {
                $result[$i][$key] = $value[$i] ?? null;
            }
        }

        return $result;
    }




    public function deleteEvent(Events $event)
    {

        $event->delete();
    }







    public static function storeFile(object $request, Model $response)
    {

        // check the request type
        if ($request->type === 'experience' || $request->type === 'course')
            $type = 'trailer';
        elseif ($request->type === 'lesson')
            $type = 'video';
        else
            $type = 'video';

        // dinamyc folder
        $folder = "$request->type-$response->id/";

        // check if exists the request file
        if ($request->file('video')) {
            $subFolder = 'video';
            $file = $request->file('video')[0];
            $video = $file->store($folder . $subFolder, 'public');

            $files  = $response->files();

            $response->files()->updateOrCreate(
                [
                    'files_id' => $response->id,
                    'type' => $type
                ],
                [
                    'type' => $type,
                    'file' => $video
                ]
            );
        }

        if ($request->iframeYT) {
            $response->files()->updateOrCreate(
                [
                    'files_id' => $response->id,
                    'type' => 'youtube'
                ],
                [
                    'type' => 'youtube',
                    'file' => $request->iframeYT
                ]
            );
        }

        // check if exists the request file
        if ($request->file('photo')) {
            $subFolder = 'images';
            $file = $request->file('photo')[0];
            $photo = ($file->store($folder . $subFolder, 'public'));
            $response->files()->updateOrCreate(
                [
                    'files_id' => $response->id,
                    'type' => 'photo'
                ],
                [
                    'type' => 'photo',
                    'file' => $photo
                ]
            );
        }
    }


    public function destroyFile(Request $request)
    {

        \File::delete('storage/' . $request->key);
        return response()->json('eliminado exitosamente');
    }

    public function courseOrLesson($request): array
    {
        $data = [];

        if ($request->isCourse === 'lessons') {
            $data['object'] = Lesson::find($request->collect);
            $data['route'] = route('public.payment.checkout.lesson', [
                'lesson' => $data['object']
            ]);
        } else {
            $data['object'] = Course::find($request->collect);
            $data['route'] = route('public.payment.checkout.course', [
                'course' => $data['object']
            ]);
        }

        return $data;
    }
}

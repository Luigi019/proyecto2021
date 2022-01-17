<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;
use Yajra\DataTables\Html\Builder;
use Illuminate\Http\RedirectResponse;
use Model;
use App\Models\Tag;
use App\Models\Page;
class BaseController extends Controller
{

    protected  array $data = [];
    protected string $layout = 'panel.layouts.app';
    protected string $view;
    protected object $builder;

    public function __construct(Builder $builder)
    {

        $this->builder = $builder;
    }

    public function loadView(string $view) : View
    {

        $this->data['layout'] = $this->layout;
        return view($view,
         $this->data,
        [ 'html'=>$this->builder]
        );
    }

    public function redirectRoute(string $nameRoute) : RedirectResponse
    {
        return redirect()->route($nameRoute , $this->data);
    }

    /**
     * Generate the table rows
     *
     *
     * @return DataTables|object
     */
    public function getFieldDataTable($query) : object
    {
        return \DataTables::eloquent($query);
    }

    /**
     * Generate the table rows
     *
     * @param query $query
     * @return DataTables|object
     */
    public function datatable($query) : object
    {
        return \DataTables::of($query);
    }

    public static function haveTags(object $data) : object
    {
        $array = [];
        $tags = Tag::all();
        $taggable = $data->tags()->get();
        $haveTag = true;
        foreach($tags as $tag)
        {
            if($taggable->contains($tag))
            {
                $array[$tag->tag]['check'] = $haveTag;
                $array[$tag->tag]['id'] = $tag->id;
                $array[$tag->tag]['tag'] = $tag->tag;

            }
            else
            {
                $array[$tag->tag]['check'] = !$haveTag;
                $array[$tag->tag]['id'] = $tag->id;
                $array[$tag->tag]['tag'] = $tag->tag;
            }
        }

        return (object)$array;


    }
    public function destroy()
    {
        $model  = request('model');
        $object = app('App\Models\\' . ucfirst($model));
       $data = $object::find(request()->only('id')['id']);

//        try {
            $data->delete();
            return response()->json([
                'status' => 200,
                'message' => 'eliminado exitosamente'
            ]);
//        } catch (\Exception $th) {
//            return response()->json([
//                'status' => 400,
//                'message' => 'Error al eliminar: '/$th->getMessage(),
//                'exception'=>$th
//            ]);
//        }
    }

    public function deleteProduct()
    {
        $data = $this->getObject();
        $stripeKey = env('STRIPE_SECRET');
       $stripe = new \Stripe\StripeClient($stripeKey);
       $product = $stripe->prices->retrieve($data->stripe_id);
//        try {
        $stripe->plans->delete($data->stripe_id,);
        $stripe->products->delete($product->product);
        $data->delete();
        return response()->json([
            'status' => 200,
            'message' => 'eliminado exitosamente'
        ]);
//        } catch (\Exception $th) {
//            return response()->json([
//                'status' => 400,
//                'message' => 'Error al eliminar: '/$th->getMessage(),
//                'exception'=>$th
//            ]);
//        }
    }

    public function getObject()
    {
        $model  = request('model');
        $object = app('App\Models\\' . ucfirst($model));
        return $object::find(request()->only('id')['id']);
    }

    public function destroyFile(Request $request)
    {
     
       (app('App\Models\\'.$request->model)::find($request->parentId)->files()->find($request->childId)->delete());
        \File::delete('storage/'.$request->key);
        return response()->json('eliminado exitosamente');

    }


    public function editable()
    {
        $route = request('route');
        $param = request('id');
        $model = request('model');
        $model = app("App\Models\\$model");
        $object= $model::find($param);

        return route($route , $object);
    }


}

import ReactDOM from 'react-dom';
import React, {Component} from 'react';
import axios from 'axios';
import {connect, createLocalVideoTrack} from 'twilio-video';

class App extends Component {

    constructor() {
        super()

        this.user = window.user;
        this.lesson = window.lesson;
        this.state = {
            accessToken: null
        }
    }

    componentDidMount = () => {
        console.log('video chat room loading');

        this.getAccessToken()
    }

    getAccessToken = () => {

        axios.get('/api/twilio/accessToken')
            .then(response => {
                console.log('response axios', response);

                this.setState({
                    accessToken: response.data
                });
            })
            .catch(error => {
                console.log('error axios', error)
            })
            .then(()=> {
                this.connectToRoom();
            });

    }

    connectToRoom = async () =>   {
        // Join to the Room with the given AccessToken and ConnectOptions.
        const room = await connect(this.accessToken, { audio: true, video: { width: 640, height: 640 } });

        // Make the Room available in the JavaScript console for debugging.
        window.room = room;

        this.addLocalParticipant(room.localParticipant)

        // Subscribe to the media published by RemoteParticipants already in the Room.
        room.participants.forEach(participant => this.addRemoteParticipant(participant));
        room.on('participantConnected', participant => this.addRemoteParticipant(participant));
    }
    addLocalParticipant = participant => {

        // Create the video container
        this.createVideoContainer(participant)

        // Attach the
        participant.tracks.forEach(publication => {

            if ('audio' == publication.kind)
                return

            this.publishTrack(publication.track, participant)
        })
    }

    addRemoteParticipant = (participant) => {

        this.createVideoContainer(participant)

        // Set up listener to monitor when a track is published and ready for use
        participant.on('trackSubscribed', track => {
            this.publishTrack(track, participant);
        });
    }

    createVideoContainer =  (participant) => {

        // Add a container for the Participant's media.
        const div = document.createElement('div');
        div.id = participant.sid;
        div.classList.add("overflow-hidden", "rounded-md", "bg-gray-100", "z-10");

        document.getElementById('video-chat-window').appendChild(div);
    }

    publishTrack = ( track, participant ) => {
        const videoContainer = document.getElementById(participant.sid);
        videoContainer.appendChild(track.attach())
    }
    render() {
        return (
            <div ref={ref => {
                this.myVideo = ref
            }}
            id={'video-chat-window'}
            >

            </div>
        );
    }
}

export default App;
if (document.getElementById('react-app')) {
    ReactDOM.render(<App/>, document.getElementById('react-app'));
}

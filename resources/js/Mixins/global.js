import axios from 'axios'
import Vue from 'vue'

export default {
    data() {
        return {
            question_button: false,
            all_tags:[]
        }
    },

    methods: {
        getTags(){
            axios.get('/api/tags')
            .then(response=>{
                this.all_tags = response.data
            })
            .catch(error=>{
                console.log(error.response)
            })
        },

        timeSince(date) {

            var seconds = Math.floor((new Date() - date) / 1000);

            var interval = seconds / 31536000;

            if (interval > 1) {
                return Math.floor(interval) + " years";
            }
            interval = seconds / 2592000;
            if (interval > 1) {
                return Math.floor(interval) + " months";
            }
            interval = seconds / 86400;
            if (interval > 1) {
                return Math.floor(interval) + " days";
            }
            interval = seconds / 3600;
            if (interval > 1) {
                return Math.floor(interval) + " hours";
            }
            interval = seconds / 60;
            if (interval > 1) {
                return Math.floor(interval) + " minutes";
            }
            return Math.floor(seconds) + " seconds";
        }
    }
}
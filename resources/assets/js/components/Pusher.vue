<template>
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pusher Template</div>

                    <div class="panel-body">
                        Pusher Template
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    var Pusher = require('pusher-js');

    Vue.use(require('vue-resource'));

    new Vue({
        ready: function () {
            this.pusher = new Pusher('cea8f9daca31fcc5a0b1');

            this.pusherChannel = this.pusher.subscribe('channel-one');

            this.pusherChannel.bind('EventClass', function (data) {
                console.log(data);
            });
        },
    });
</script>

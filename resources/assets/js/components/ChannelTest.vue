<template>
    <div class="container">
        <div class="row">
            <h2>这是广播的测试</h2>
        </div>
    </div>
</template>

<script>
    export default {
        created(){
            Echo.channel('channel-test')
            .listen('BroadcastChannel', (e) => {
                console.log('到了')
                console.log(e)
            })

            Echo.channel('news')
            .listen('News', (e) => {
                console.log('到了')
                console.log(e)
            })

            console.log(Echo)
        }
    }
</script>

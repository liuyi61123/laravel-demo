<template>
    <div>
        <div class="panel panel-default">
            <div class="panel-heading">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    <span>
                        获取token
                    </span>

                    <a class="action-link" @click="refreshToken">
                       刷新token
                    </a>
                </div>
            </div>

            <div class="panel-body">
               <form>
                    <div class="form-group">
                        <label>grant_type </label>
                        <input type="text" class="form-control"  placeholder="grant_type" v-model="form.grant_type">
                    </div>
                    <div class="form-group">
                        <label>client_id </label>
                        <input type="number" class="form-control"  placeholder="client_id" v-model="form.client_id">
                    </div>
                    <div class="form-group">
                        <label>client_secret</label>
                        <input type="text" class="form-control"  placeholder="client_secret" v-model="form.client_secret">
                    </div>
                    <div class="form-group">
                        <label>username</label>
                        <input type="text" class="form-control"  placeholder="username" v-model="form.username">
                    </div>
                    <div class="form-group">
                        <label>password </label>
                        <input type="password " class="form-control"  placeholder="password" v-model="form.password">
                    </div>
                    <div class="form-group">
                        <label>scope </label>
                        <input type="text" class="form-control"  placeholder="scope" v-model="form.scope">
                    </div>
                    <button type="button" class="btn btn-default" @click="getToken">提交</button>
                </form>
                <div>
                    <pre>{{result}}</pre>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        /*
         * The component's data.
         */
        data() {
            return {
                result:'',
                form: {
                    grant_type:'password',
                    client_id:3,
                    client_secret:'CvNLjLyGLsyHlwwPqsVM4kUbYwCkdZOHSUSDGT9f',
                    username:'liuyi61445@gmail.com',
                    password: 'password',
                    scopes: ''
                }
            };
        },
        methods:{
            getToken(){
                axios
                .post('/oauth/token',this.form)
                .then(response => {
                    console.log(response)
                    this.result = response.data
                });
            },
            refreshToken(){
                //判断token是否存在
                if(this.result){
                    let data = {
                        grant_type:'refresh_token',
                        client_id:3,
                        client_secret:'CvNLjLyGLsyHlwwPqsVM4kUbYwCkdZOHSUSDGT9f',
                        refresh_token:this.result.refresh_token,
                        scopes: ''
                    }
                    axios
                    .post('/oauth/token',data)
                    .then(response => {
                        console.log(response)
                        alert('刷新成功')
                        this.result = response.data
                    });
                }else{
                    //token不存在
                    alert('还没有token')
                }
                
            }
        }
    }
</script>

<style lang="">
    
</style>
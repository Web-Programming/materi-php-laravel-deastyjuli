<template>
  <div>
      <layout-main>
          <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Create New User</h1>
          </div>
          <div>
                <div v-if="datausers == null && errormessage !== null" class="alert alert-danger" role="alert">
                    {{errormessage}}
                </div>

                <div v-if="succesmessage !== null" class="alert alert-success" role="alert">
                    {{succesmessage}}
                </div>

                <form @submit.prevent ="createNewUser">
                    <div class="mb-3">
                        <label for="name" class="form-label">Name</label>
                        <input v-model="user.name" type="text" class="form-control" id="name">
                    </div>
                    <div class="mb-3">
                        <label for="username" class="form-label">Username</label>
                        <input v-model="user.username" type="text" class="form-control" id="username">
                    </div>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </form>
          </div>
      </layout-main>
  </div>
</template>

<script>
import LayoutMain from "@/views/LayoutMain"
import axios from "axios"
export default {
    components : {
        LayoutMain
    }, 
    data() {
        return{
            user: {name: null, username: null},
            datausers : null,
            errormessage: null,
            succesmessage: null
        }
    },
    methods : {
        createNewUser() {
            /*fetch("https://jsonplaceholder.typicode.com/users", 
                {
                    headers: {
                        'Content-type': 'application/json; charset=UTF-8',
                    },
                    method : 'POST',
                    body: JSON.stringify(this.user)
                })                
                .then(response => response.json()) //then 1 untuk set respon sebagai json
                .then(json => {
                    if(json?.id !== undefined){
                        this.datausers = json;
                        this.succesmessage = "Data berhasil disimpan!"
                    }else{
                        this.errormessage = "Data gagal disimpan!";
                    }
                }) //then2 mengambil json dan di tmpung k dlm data
                .catch(error => {
                    console.log(error);
                    this.errormessage = "Gagal. Silahkan coba lagi!";
                })*/
            axios.post("https://jsonplaceholder.typicode.com/users", this.user)
                .then(json => {
                    if(json.status === 201){
                        this.datausers = json.data;
                        this.succesmessage = "Data berhasil disimpan!"
                    }else{
                        this.errormessage = "Data gagal disimpan!";
                    }
                })
                .catch(() => {
                    this.errormessage = "Gagal. Silahkan coba lagi!";
                })
        }
    }
}
</script>
<template>
    <div>
        <layout-main>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Users</h1>
            </div>
            <div class="row row-cols-1 row-cols-md-4 row-cols-sm-2 g-2">
                <div v-for="user in datausers" :key="user.id" class="col card">
                    <img src="/default-pp.png" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{ user.company.name }}</h5>
                        <address class="card-text">
                           <strong>{{ user.Username }}</strong>   
                           <br>
                            {{user.address.street}}, {{user.address.suite}}<br>
                            {{user.address.city}}, {{user.address.zipcode}}<br>
                            <abbr title="phone">{{user.phone}}</abbr><br/>
                            <strong>{{user.username}}</strong> <br>
                            {{user.email}}
                        </address>
                        <router-link 
                        :to="{name:'detailuser', 
                        params: { id: user.id, username: user.username }}" 
                        class="btn btn-primary">Detail User</router-link>
                    </div>
                </div>
            </div>
        </layout-main>
    </div>
</template>

<script>
import LayoutMain from "@/views/LayoutMain"
import axios from "axios"
export default {
    components: {
        LayoutMain
    },
    data() {
        return {
           datausers: null,
        }
    },
    methods: {
        getUsers(){
            /*fetch("https://jsonplaceholder.typicode.com/users")
                .then(response => response.json()) //then 1, set response sebagai json
                .then(json => {
                    this.datausers = json;    
                }) //then2, mengambil json dan ditampung/diset ke dalam data
                .catch(error => {
                    console.log(error);
                })*/
            axios.get("https://jsonplaceholder.typicode.com/users")
                .then(json => {
                    console.log(json);
                    this.datausers = json.data;
                })
                .catch(error => {
                    console.log(error);
                })
        }
    },    
    mounted() {
        this.getUsers();
    }
}
</script>
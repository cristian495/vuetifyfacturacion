<template>
    <v-container
        class="fill-height"
        fluid
    >
        <v-row align="center" justify="center">
            <v-col  md="4">
                <v-card class="m-auto" outlined flat min-width="300">
                <v-toolbar
                    color="primary"
                    flat
                    dark=""
                    align="center"
                    justify="center"
                ><v-row justify="center" class="title">Acceso al Sistema </v-row>
                </v-toolbar>
                <v-card-text>
                    <v-form @submit.prevent="authenticate">
                        <v-text-field
                            label="Login"
                            name="login"
                            prepend-icon="mdi-account"
                            type="text"
                            v-model="form.email"
                        />

                        <v-text-field
                            id="password"
                            label="Password"
                            name="password"
                            prepend-icon="mdi-lock"
                            :type="show ? 'text' : 'password'"
                            :append-icon="show ? 'mdi-eye' : 'mdi-eye-off'"
                            @click:append="show = !show"
                            v-model="form.password"
                        />

                        <v-card-actions>
                            <v-spacer />
                            <v-btn type="submit" color="primary">Ingresar</v-btn>
                        </v-card-actions>
                    </v-form>
                </v-card-text>
                
                </v-card>
            </v-col>
        </v-row>
    </v-container>
</template>

<script>

import {login} from '../helpers/auth.js';
export default {
    data:()=>({
        show:false,
        form:{
            email:'',
            password:'',
        }
    }),
    methods: {
        authenticate() {
            this.$store.dispatch('login');

            login(this.$data.form)
                .then((res)=>{
                    this.$store.commit('loginSuccess', res);
                    this.$router.push({path: "/"});

                })
                .catch((error) =>{
                    this.$store.commit("loginFailed", {error});
                });
        }
    }
}
</script>

<style>

</style>
<template>
    <v-app class="grey lighten-4">
		<v-content class="ma-5">

            <v-col md="2" sm="4" cols="12">
                <v-select
                :items="departments"
                item-text="description"
                item-value="value"
                v-model="departmentCode"
                label="Departamento"
                :rules="departmentEstablishmenRules"
                            ></v-select>
            </v-col>
		</v-content>
    </v-app>
</template>

<script>
    export default {
        mounted() {
            console.log('Component mounted.')
        }
    }
</script>

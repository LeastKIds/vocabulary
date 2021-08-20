<template>
    <div>
        <v-container>
            <v-row class="mt-5" style="font-size:50px">
                Profile
            </v-row>
            <v-divider></v-divider>
            <v-row>
                <v-avatar size="150" class="mt-10">
                    <img src="../assets/yomi.jpg">
                </v-avatar>
                <v-col class="ma-14">
                    <v-row style="font-size:30px;font-weight:bold;font-family:serif;">
                        {{ userinfo.user.email }}
                    </v-row>
                    <v-row style="font-size:20px;font-weight:bold;" class="mt-8">
                        {{ userinfo.user.name  }}
                    </v-row>
                </v-col>
            </v-row>
        </v-container>
    </div>
</template>

<script>
import axios from 'axios'
export default {
    
    name: 'ProFile',

    data() {
        return {
            userinfo: {

            }
        }
    },
    methods: {

    },
    created() {
        axios.get('/api/auth/user')
        .then((res) => {
            this.userinfo = res.data
            console.log(this.userinfo)
            console.log('200')
        })
        .catch((err) => {
            if(err) {
                console.log('ERROR')
            }
        })
    }
}
</script>

<style scoped>
* {
    font-family: "serif" !important;


}
</style>
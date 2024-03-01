<script>
import axios from "axios";
import { toDisplayString } from "vue";

export default {
    name: "EventList",
    data() {
        return {
            login: false,

            user: {
                email: "prova@hotmail",
                password: "password",
            },

            events: [],
        };
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/events")
            .then((res) => {
                const data = res.data;
                this.events = data.events;
                console.log("events:", this.events);
            })
            .catch((err) => {
                console.err(err);
            });
    },

    methods: {
        insUser() {
            axios
                .get("http://localhost:8000/api/v1/login")

                .then((res) => {
                    const data = res.data;
                    this.events = data.events;
                    console.log("events:", this.events);
                })

                .catch((err) => {
                    console.log("Errori", err);
                });
        },
    },
};
</script>

<template>
    <div v-if="login" class="container">
        <h1 class="mt-5 text-center">Eventi</h1>
        <ul class="list-group col-6 mx-auto text-center">
            <li
                v-for="event in events"
                :key="event.id"
                class="list-group-item d-flex justify-content-between align-items-center py-3"
            >
                <a
                    class="link-underline link-underline-opacity-0 flex-grow-1"
                    href="#"
                >
                    <h4 class="mb-0">{{ event.nome_evento }}</h4>
                </a>
            </li>
        </ul>
    </div>

    <form action="" @submit.prevent="createUser">
        <input type="text" v-model="user.email" placeholder="Email User" />
        <input
            type="text"
            v-model="user.password"
            placeholder="User Password"
        />
        <input type="submit" value="login" @click="insUser()" />
    </form>
</template>

<style scoped lang="scss"></style>

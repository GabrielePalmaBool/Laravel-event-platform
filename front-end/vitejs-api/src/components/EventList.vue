<script>
import axios from "axios";
import { toDisplayString } from "vue";

export default {
    name: "EventList",
    data() {
        return {
            login: false,

            user: {
                email: "gbayer@example.org",
                password: "password",
            },

            events: [],
            users: [],
        };
    },

    methods: {
        UserLogin(value) {
            this.login = value;
        },

        createUser() {
            console.log("submit with: ", this.user);

            axios
                .post("http://localhost:8000/api/v1/login", this.user)

                .then((res) => {
                    this.users = res.data;
                    console.log("user:", this.users);
                })

                .catch((err) => {
                    console.log("Errori", err);
                });
        },
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
};
</script>

<template>
    <!-- Lista eventi -->
    <div class="container">
        <!-- Form per il login -->
        <div class="form" v-if="login">
            <form @submit.prevent="createUser">
                <h1 class="mt-5 text-center">Effettuare Login</h1>

                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label"
                        >Inserire Email</label
                    >
                    <input
                        type="email"
                        class="form-control w-50"
                        v-model="user.email"
                        placeholder="Email User"
                        name="email"
                        id="email"
                    />
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label"
                        >Password</label
                    >
                    <input
                        type="password"
                        class="form-control w-50"
                        v-model="user.password"
                        placeholder="User Password"
                        id="password"
                        name="password"
                    />
                </div>
                <input type="submit" class="btn btn-primary" value="login" />
            </form>

            <button class="btn btn-danger" @click="UserLogin(false)">
                Indietro
            </button>
        </div>
        <ul v-else class="list-group col-6 mx-auto text-center">
            <h1 class="mt-5 text-center">Eventi</h1>

            <button class="btn btn-danger" @click="UserLogin(true)">
                Login
            </button>

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
</template>

<style scoped lang="scss">
.container {
    .list-group {
        button {
            margin: 2% 40% 2% 40%;
        }
    }

    .form {
        margin: 0% 0% 1% 30%;

        h1 {
            margin: 0% 50% 1% 0%;
        }

        button {
            margin: -6% 50% 1% 8%;
        }
    }
}
</style>

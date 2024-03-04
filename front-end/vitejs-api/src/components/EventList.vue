<script>
import axios from "axios";

export default {
    name: "EventList",
    data() {
        return {
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
};
</script>

<template>
    <!-- Lista eventi -->
    <div class="container">
        <ul class="list-group col-6 mx-auto text-center">
            <h1 class="mt-5 text-center">Eventi</h1>
            <router-link to="/about">About</router-link>
            <br />
            <router-link to="/tags">Tags</router-link>

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
}
</style>

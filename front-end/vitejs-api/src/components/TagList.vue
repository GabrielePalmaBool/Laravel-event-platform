<!-- Tags.vue -->
<script>
import axios from "axios";

export default {
    name: "TagList",
    data() {
        return {
            tags: [],
        };
    },

    mounted() {
        axios
            .get("http://localhost:8000/api/v1/tags")
            .then((res) => {
                const data = res.data;
                this.tags = data.tags;
                console.log("events:", this.tags);
            })
            .catch((err) => {
                console.err(err);
            });
    },
};
</script>

<template>
    <!-- Lista tag -->
    <div class="container">
        <h1 class="mt-5 text-center">Tags</h1>

        <div class="mt-5 text-center">
            <router-link to="/about">About</router-link>
            <br />
            <router-link to="/">Eventi</router-link>
        </div>

        <ul class="list-group col-6 mx-auto text-center">
            <li
                v-for="tag in tags"
                :key="tag.id"
                class="list-group-item d-flex justify-content-between align-items-center py-3"
            >
                <a
                    class="link-underline link-underline-opacity-0 flex-grow-1"
                    href="#"
                >
                    <h4 class="mb-0">{{ tag.name }}</h4>
                </a>
            </li>
        </ul>
    </div>
</template>

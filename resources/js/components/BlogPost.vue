<template>
    <li class="post parent">
        <div style="width: 10rem;height: 100%;flex-shrink: 0;">
            <img :src="post.cover" :alt="`Copertina ${post.title}`">
        </div>
        <div>
            <div>
                <h3 class="post-title">{{ post.title }}</h3>
                <router-link :to="{name: 'dett-post', params: {slug: post.slug}}" class="show-post">Vedi Post</router-link>

                <hr class="my-3"/>
                <p>{{ truncateText(post.content, 100) }}</p>
            </div>
            <div class="info-post">
                <div class="post-category">
                    <p>{{ post.category.title }}</p>
                    <p v-if="post.category.length = 0">Nessuna Categoria</p>
                </div>
                <div class="post-date">
                    <p>{{post.created_at}}</p>
                </div>
            </div>
        </div>
    </li>
</template>

<script>


export default {
    name:'blogPost',
    props:{
        post: Object,
    },
    data() {
        return {
            date: '',
            convertedDate: '',
        }
    },
    methods:{
        convertDate(date) {
            return date.toUTCString();
        },
        truncateText(text, maxLength) {
            if (text.length < maxLength) {
                return text;
            } else {
                return text.substring(0, maxLength) + '...';
            }
        }
    }
}
</script>

<style lang="scss" scoped>

    @import "../../sass/partials/palette";

    .post {
        background-color: #ffffff;
        margin: 3rem auto;
        position: relative;
        padding: 1rem;
        box-shadow: 0 0 6px black;
        border-radius: 10px;
        width: 50vw;
        display: flex;
        align-items: center;
        justify-content: space-between;

        img {
            width: 90%;
            margin: auto;
        }

        @media screen and (max-width: 978px){
            flex-direction: column;
        }

        hr {
            color: $blue-secondary;
            margin: 0.8rem 0 1rem;
            background-color:  $blue-secondary;
            height: 5px;

        }
        .info-post {
            display: flex;
            justify-content: space-between;
            padding: 1rem 0;
            align-items: center;
        }

        .post-title {
            font-weight: bold;
            font-size: 20px;
            text-transform: capitalize;
        }

        .post-category {
            padding: 1rem 0;

            p {
                font-style: italic;
                font-weight: 500;
            }

        }
        .post-date {
            text-align: right;
            padding: 1rem 0;
            font-style: italic;
            font-weight: 500;
        }
    }
    .show-post   {
        text-align: center;
        position: absolute;
        right: 3rem;
        top: 1rem;
        border-radius: 5px;
        background-color: rgba(89, 164, 238, 0.8);
        border: 1px solid black;
        box-shadow: 0 0 5px #000;
        width: 90px;

            @media screen and (max-width: 978px){
                right: 50%;
                transform: translateX(50%);
                bottom: 20px;
                top: unset;
            }
    }
</style>

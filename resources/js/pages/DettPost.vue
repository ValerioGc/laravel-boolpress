<template>
    <div class="post-details-container">
        <article v-if="post">
            <div class="post-info">
                <div class="post-category">
                    <p><b>Categoria:</b> {{post.category ? post.category.title: 'Nessuna categoria'}} </p>
                </div>
                <ul class="post-tags">
                    <li><b>Tags:</b></li>
                    <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                </ul>
            </div>
            <div class="post-content">
                <img class="post-img" :src="post.cover" :alt="post.title" />
                <h2 class="post-title">{{post.title}}</h2>
                <hr />
                <p>{{post.content}}</p>
            </div>
        </article>
        <div v-else class="loading-alert">
            <i class="fa-3x fa-spin fa-solid fa-spinner"></i>
            <p>Caricamento post in corso..</p>
        </div>
        <router-link :to="{name: 'blog'}" class="btn">Torna ai post</router-link>
    </div>
</template>

<script>


    export default {
        name:'DettPost',
        data() {
            return {
                post: null
            }
        },
        beforeMount() {
            this.getPostDetails();
        },
        methods: {
            async getPostDetails() {
                const slug = this.$route.params.slug;
                try {
                    const response = await axios.get('/api/posts/' + slug);
                    this.post = response.data.result;
                }
                catch(err){
                    await this.$router.push({name: 'not-found'});
                }
                console.table(this.post);

            },
        }
    }

</script>

<style lang="scss" scoped>

    @import "../../sass/partials/palette";

    .post-details-container {
        min-height: 70vh;
        border-radius: 5px;
        width: 70%;
        margin: 2rem auto;
        background-color: $ice;
        text-align: center;


        .loading-alert {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 0;
        }


        article {
            padding: 2rem;

            .post-info {
                display: flex;
                justify-content: space-between;
                align-items: baseline;
                padding: 1rem 0;
            }

            hr {
                margin: 1rem auto;
                background-color: $blue-secondary;
                border-color: $blue-secondary;
                padding: 2px;
                box-shadow: 1px 0 2px #000000;
            }

            p {
                text-align: left;
            }

            .post-content {
                width: 50%;
                margin: auto;

                img {
                    margin: 1rem 0;
                }

                .post-title {
                    text-transform: capitalize;
                    color: $blue-primary;
                }
            }
        }
        .btn {
            display: inline-block;
            box-shadow: 0 0 5px $grey-dark;
            text-shadow: 0 0 3px $dark;
            background-color: $blue-secondary;
            color: $ice;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 2rem 0;
            text-decoration: none;
            font-weight: 600;

            &:hover {
                transition: all 0.3s linear 0.1s;
                background-color: $blue-primary;
                color: $light-blue-light;
                box-shadow: 0 0 7px $grey-dark;
                transform: scale(1.1);
            }
        }
    }

</style>

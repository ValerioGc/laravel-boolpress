<template>
    <div class="post-details-container">
        <article v-if="post">
            <div class="post-info">
                <div class="post-category">
                    <p><b>Categoria:</b> {{post.category ? post.category.name: 'Nessuna categoria'}} </p>
                </div>
                <ul class="post-tags">
                    <li><b>Tags:</b></li>
                    <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                </ul>
            </div>
            <div class="post-content">
                <img class="post-img" :src="post.cover" :alt="post.title" />
                <h2>{{post.title}}</h2>
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
            },
        },
        beforeMount() {
            this.getPostDetails();
        }
    }

</script>

<style lang="scss" scoped>

    @import "../../sass/partials/palette";

    .post-details-container {
        border-radius: 5px;
        width: 70%;
        margin: 2rem auto;
        background-color: $ice;
        text-align: center;


        i {
            display: block;
        }

        .loading-alert {
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 4rem 0;
        }

        .btn {
            display: inline-block;
            box-shadow: 0 0 5px #000;
            background-color: white;
            border-radius: 5px;
            padding: 5px 10px;
            margin: 2rem 0;
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
                background-color:white;
            }

            p {
                text-align: left;
            }

            .post-content {
                width: 50%;
                margin: auto;
            }
        }
    }


</style>

<template>
    <div class="post-details-container">
        <router-link :to="{name: 'blog'}">Torna ai post</router-link>
        <article v-if="post">
            <div class="post-info">
                <div>
                    {{post.category?post.category.name:'Nessuna categoria'}}
                </div>
                <ul class="post-tags">
                    <li v-for="tag in post.tags" :key="tag.id">{{tag.name}}</li>
                </ul>
            </div>
            <img class="post-img" :src="post.cover" :alt="post.title" />
            <h2>{{post.title}}</h2>
            <hr />
            <p>{{post.content}}</p>
        </article>
        <div v-else>
            <div>
                <span>Caricamento post in corso</span>
            </div>
        </div>
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

    .post-details-container {
        width: 70%;
        margin: 2rem auto;
        background: red;


        article {

            background: blue;
        }
    }

</style>

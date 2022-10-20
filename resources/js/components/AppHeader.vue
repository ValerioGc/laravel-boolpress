<template>
    <header>
        <nav>
            <div class="logo">
                <router-link :to="{name: 'home'}" >
                    <img src="https://upload.wikimedia.org/wikipedia/commons/9/9a/Laravel.svg" alt="Logo">
                </router-link>
            </div>
            <a href="#" class="hamburger" @click.prevent="showMenu()">
                <i class="fa-2x fa-solid fa-bars"></i>
            </a>
            <ul class="navItems" :class="(showMobileMenu === true)? 'd-none':''">
                <li v-for="(item, index) in navItems" :key="index"
                    :class="($route.name === item.routeName)?'active':'' ">
                    <router-link :to="{name: item.routeName}" >{{item.page}}</router-link>
                </li>
            </ul>
        </nav>
    </header>
</template>

<script>
    export default {
        name:'appHeader',
        methods: {
          showMenu() {
              this.showMobileMenu = this.showMobileMenu !== true;
          }
        },
        data() {
            return {
                showMobileMenu: false,
                navItems: [
                    {
                        page:'Home',
                        routeName: 'home'
                    },
                    {
                        page:'Blog',
                        routeName: 'blog'
                    },
                    {
                        page:'Contatti',
                        routeName: 'contact'
                    },
                    {
                        page:'About Us',
                        routeName: 'about-us'
                    }
                ]
            }
        }
    }
</script>

<style lang="scss" scoped>

    @import "../../sass/partials/palette";
    .d-none{
        display: none!important;
    }

    @keyframes test {
        0% {height: 0}
        100% {height: 100%}
    }

    header {
        width: 100%;
        background-color: $blue-secondary;
        z-index: 99;
        position: sticky;
        top: 0;
        box-shadow: 2px 2px 5px $dark;

        .logo {
            width: 50px;
            padding: 1rem 0;
        }

        .hamburger {
            display: none;

            @media screen and (max-width: 978px){
                display: inline-block;
            }
        }

        nav  {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 2rem;

            .navItems  {
                display: flex;
                justify-content: space-between;
                flex-basis: 40%;
                align-items: center;
                margin:0;
                text-align: center;


                @media screen and (max-width: 978px){
                    flex-direction: column;
                    background-color: $ice;
                    color: black;
                    border-bottom: 2px solid green;
                    text-align: center;
                    position: absolute;
                    left: 0;
                    right: 0;
                    top: 5rem;
                    transition:all 1s linear 0.1s;
                    animation: test 1s linear;
                }

                .active {
                    border-color: $light-blue-dark;

                    a {
                        color: $light-blue-dark;
                    }

                }

                li {
                    border-bottom: 2px solid transparent;
                    width: 20%;

                    @media screen and (max-width: 1100px){
                        width: 25%;

                    }
                    @media screen and (max-width: 976px){
                        display: block;
                        width: 100%;
                    }

                     &:hover {
                         border-color: $light-blue-dark;

                         a {
                             color: $light-blue-dark;
                         }
                     }

                    a {
                        line-height: 5.5rem;
                        font-size: 18px;
                        font-weight: bold;
                        text-shadow: 1px 1px 1px $dark;
                        color: $ice;
                    }
                }
            }
        }
    }
</style>

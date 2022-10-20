<template>
    <body>
        <appHeader />
        <div class="wrapper">
            <appMain />
        </div>
    </body>
</template>

<script>

    import appHeader from "../components/AppHeader";
    import appMain from "../components/AppMain";

    export default {
        name: 'App',
        components: {
            appHeader,
            appMain,
        }
    }
</script>

<style lang="scss"></style>

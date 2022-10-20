<template>
    <div class="home-page-container">
        <h1>Benvenuto in Boolpress</h1>
        <h3>Ultimi Post:</h3>
        <table>
            <thead>
                <tr>
                    <th>test</th>
                    <th>test</th>
                    <th>Test</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
            </tbody>
        </table>

        <h3>
            Contattaci:
        </h3>
        <router-link :to="{name: 'contact'}">Vai alla pagina</router-link>
    </div>
</template>

<script>

    export default {
        name: "HomePage",
    }

</script>

<style lang="scss" scoped>

    .home-page-container {
        text-align: center;
        min-height: 86vh;

        table {
            text-align: center;
            margin: auto;
        }
    }

</style>

<template>

     <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(course)">
            Ви Записані
            <!--<i class="fa fa-plus-square" aria-hidden="true"></i>-->
        </a>
        <a href="#" v-else @click.prevent="favorite(course)">
            Записатися
            <i class="fa fa-plus-square-o" aria-hidden="true"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['course', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(course) {
                axios.post('/favorite/'+course)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(course) {
                axios.post('/unfavorite/'+course)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
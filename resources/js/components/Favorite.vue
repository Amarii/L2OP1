<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(drawing)">
            <i class="fab fa-angellist"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(drawing)">
            <i class="fab fa-angellist"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['drawing', 'favorited'],

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
            favorite(drawing) {
                axios.post('/favorite/'+drawing)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(drawing) {
                axios.post('/unfavorite/'+drawing)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>
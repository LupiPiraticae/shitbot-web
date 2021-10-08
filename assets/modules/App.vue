<template>
    <div id='app'>
        <b-container>
            <b-row>
                <b-col>
                    <h2>Facilities</h2>
                </b-col>
            </b-row>
            <b-row>
                <b-col v-for="facility in facilities" :key="facility.id">
                    <b-card
                        :title="facility.name"
                        img-src="/img/toilet.jpg"
                        class="mb-2"
                        :bg-variant="isOccupied(facility)"
                    >
                    </b-card>
                </b-col>
            </b-row>
        </b-container>
    </div>
</template>

<script>
export default {
    data() {
        return {
            facilities: []
        }
    },
    created() {
        this.$http.get('/facility/list')
            .then(response => {
                this.facilities = response.data;
            });
    },
    methods: {
        isOccupied(f) {
            return f.state == 'occupied' ? 'danger' : 'light';
        }
    }
}
</script>

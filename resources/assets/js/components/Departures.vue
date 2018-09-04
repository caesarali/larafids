<template>
    <table class="table table-hover table-striped">
        <thead class="thead-dark">
            <tr>
                <th width="300">Airline</th>
                <th>Flight Number</th>
                <th>Destination</th>
                <th class="text-center">Terminal</th>
                <th class="text-center">Scheduled</th>
                <th class="text-center pl-0">Remarks</th>
                <th class="text-center">Estimated</th>
            </tr>
        </thead>
        <tbody class="text-white">
            <tr v-for="flight in flights" :key="flight.id">
                <td class="airlines">
                    <img :src="'storage/' + flight.airline.logo" :alt="flight.airline.logo" class="img-fluid">
                </td>
                <td>{{ flight.flight_number }}</td>
                <td>{{ flight.destination.name }}</td>
                <td class="text-center"><span class="badge badge-warning">{{ flight.terminal }}</span></td>
                <td class="text-center">{{ flight.etd }}</td>
                <td :class="background(flight.schedule.remark ? flight.schedule.remark.status : '0')" class="status animated flipInX slower">
                    {{ status(flight.schedule.remark ? flight.schedule.remark.status : '0') }}
                </td>
                <td class="text-center">
                    {{ flight.schedule.remark && flight.schedule.remark.estimated ? flight.schedule.remark.estimated : '-' }}
                </td>
            </tr>
        </tbody>
    </table>
</template>

<script>
    export default {
        data() {
            return {
                flights: []
            }
        },

        mounted() {
            this.loadData();

            setInterval(function () {
                this.loadData();
            }.bind(this), 8000);
        },

        methods: {
            loadData: function () {
                axios.get('/api/departures').then(response => {
                    this.flights = response.data
                });
            },

            status: function (status){
                switch (status) {
                    case 1:
                        return 'DELAYED';
                    case 2:
                        return 'DEPARTED';
                    case 3:
                        return 'CANCELED';

                    default:
                        return 'ON TIME';
                }
            },

            background: function (status) {
                switch (status) {
                    case 1:
                        return 'bg-warning';
                    case 2:
                        return 'bg-success';
                    case 3:
                        return 'bg-danger';

                    default:
                        return 'bg-primary';
                }
            }
        },
    }
</script>

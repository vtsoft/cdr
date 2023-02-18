<script setup>
    import ApplicationLogo from './ApplicationLogo.vue';
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/vue3'

    const data = computed(() => usePage().props.data);
</script>
<script>
    export default {
        data() {
            return {
                editMode: false,
                isOpen: false,
                form: {
                    date_from: null,
                    date_to: null,
                    src: null,
                    dst: null,
                    likeyes: null,
                    likeno: null,
                },
            }
        },
        mounted() {
            console.log(this.form)
        },
        methods: {
            search: function () {
                console.log(this.form);
                this.$inertia.get('/search', this.form);
            },
        },
    }

</script>
<style class="">
    .table-bordered th, .table-bordered td { 
        border: 1px solid #ddd!important 
    }     
</style>
<template>
    <div>
        <div class="p-6 lg:p-8 border-b font-semibold text-xl leading-tight">
            <h1 class="">Search Options</h1>
        </div>
        <div class="p-6 lg:p-8 bg-white border-gray-200">

            <form>
                <div class="col-2">
                    <div style="width: 100px; float: left;" class="mt-1"><b>Date</b></div>
                    <input type="date" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_from" name="date_from" v-model="form.date_from">
                    &nbsp&nbsp<b>~</b>&nbsp&nbsp
                    <input type="date" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_to" name="date_to" v-model="form.date_to">
                </div>
                <div class="col-4">
                    <div style="width: 100px; float: left;" class="mt-1"><b>Source</b></div>
                    <input type="text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="src" name="src" v-model="form.src">
                </div>
                <div class="col-4">
                    <div style="width: 100px; float: left;" class="mt-1"><b>Destination</b></div>
                    <input type="text" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dst" name="dst" v-model="form.dst">
                    &nbsp<b>like</b>&nbsp
                    <input type="radio" class="" id="1" name="like" v-model="form.likeyes">
                    &nbsp<b>=</b>&nbsp
                    <input type="radio" class="" id="0" name="like" v-model="form.likeno">
                </div>

                <div style="width: 100px; float: left;">&nbsp</div>
                <button @click="search(form)" type="button" class="inline-flex mt-5 justify-center rounded-md border border-gray-300 px-4 py-2 font-semibold shadow-sm hover:text-gray-500">
                    Search
                </button>
            </form>

        </div>

        <div class="grid-cols-1">

            <table class="table w-full table-hover table-bordered">
                <thead>
                    <tr class="">
                        <th class="">No.</th>
                        <th class="">Source</th>
                        <th class="">Destination</th>
                        <th class="">Result</th>
                        <th class="">In/Out</th>
                        <th class="">Duration</th>
                        <th class="">Billsec</th>
                        <th class="">Unit</th>
                        <th class="">Time</th>
                        <th class="">Date</th>
                    </tr>
                </thead>
                <tbody>
                    <tr v-for="row in data" class="">
                        <td class="text-center">{{ row.id }}</td>
                        <td class="text-center">{{ row.src }}</td>
                        <td class="text-center">{{ row.dst }}</td>                        
                        <td class="text-center">{{ row.disposition }}</td>

                        <td v-if="row.src.length == 4" class="text-center">Out</td>
                        <td v-else class="text-center">In</td>

                        <td class="text-centertext-center">{{ row.duration }}</td>
                        <td class="">{{ row.billsec }}</td>

                        <td v-if="row.dst.substring(0,2) == '01'" class="text-center">{{ Math.round(row.billsec/10) }}</td>
                        <td v-else class="text-center">{{ Math.round(row.billsec/180) }}</td>
                        
                        <td class="text-center">{{ row.calldate.substring(10) }}</td>
                        <td class="text-center">{{ row.calldate.substring(0,10) }}</td>
                    </tr>

                </tbody>
            </table>
        </div>
    </div>
</template>

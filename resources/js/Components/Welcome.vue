<script setup>
    import ApplicationLogo from './ApplicationLogo.vue';
    import { computed } from 'vue'
    import { usePage } from '@inertiajs/vue3'
    import Pagination from "@/Components/Pagination.vue";

    const data = computed(() => usePage().props.data.data);
    const links = computed(() => usePage().props.data.links);
</script>
<template>
    <div>
        <div class="p-6 lg:p-8 border-b font-semibold text-xl leading-tight">
            <h1 class="">Search Options</h1>
        </div>
        <div class="p-6 lg:p-8 bg-white border-gray-200">

            <form>
                <div class="">
                    <div style="width: 100px; float: left;" class="mt-2"><b>Date</b></div>
                    <input type="date" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_from" name="date_from" v-model="form.date_from">
                    &nbsp&nbsp<b>~</b>&nbsp&nbsp
                    <input type="date" class="shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="date_to" name="date_to" v-model="form.date_to">
                </div>
                <div class="">
                    <div style="width: 100px; float: left;" class="mt-2"><b>Source</b></div>
                    <input type="text" class="mt-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="src" name="src" v-model="form.src">
                </div>
                <div class="">
                    <div style="width: 100px; float: left;" class="mt-2"><b>Destination</b></div>
                    <input type="text" class="mt-1 shadow appearance-none border rounded py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline" id="dst" name="dst" v-model="form.dst">
                    &nbsp<b>like</b>&nbsp
                    <input type="radio" class="" value="1" name="like" v-model="form.like">
                    &nbsp<b>=</b>&nbsp
                    <input type="radio" class="" value="0" name="like" v-model="form.like">
                </div>

                <div style="width: 100px; float: left;">&nbsp</div>
                <button @click="search(form)" type="button" class="inline-flex mt-4 bg-lightseagreen-400 text-black font-bold justify-center rounded-md border px-4 py-2 font-semibold shadow-sm hover:text-white">
                    Search
                </button>
            </form>

        </div>

        <div class="p-6 lg:p-8">
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

                        <td v-if="row.src.length == 4" class="text-center">OUT</td>
                        <td v-else class="text-center">IN</td>

                        <td v-if="row.duration != 0" class="text-center">{{ row.duration }}S</td>
                        <td v-else class="text-center">{{ row.duration }}</td>
                        <td class="text-center">{{ row.billsec }}</td>

                        <td v-if="row.dst.substring(0,2) == '01'" class="text-center">{{ Math.round(row.billsec/10) }}</td>
                        <td v-else class="text-center">{{ Math.round(row.billsec/180) }}</td>
                        
                        <td class="text-center">{{ row.calldate.substring(10) }}</td>
                        <td class="text-center">{{ row.calldate.substring(0,10) }}</td>
                    </tr>                                        
                    <tr v-if="!data.length" class="">
                        <td colspan="10" class="text-center">
                            <h1 class="p-6 lg:p-8 w-full font-semibold text-xl leading-tight text-center">No Data!</h1>
                        </td>
                    </tr>                    
                </tbody>
            </table>

            <Pagination :data="links"/>
            <br/>

        </div>
    </div>
</template>
<script>
    export default {
        data() {
            return {
                form: {
                    date_from: null,
                    date_to: null,
                    src: null,
                    dst: null,
                    like: null,                    
                },
            }
        },
        mounted() {
            let url = document.URL;
            let params = url.split('?')[1];
            if(params) {
                let param_array = params.split('&');
                for (let i = 0; i < param_array.length; i++) {
                    let param = param_array[i].split('=');
                    if(param[0] !== 'page') {
                        this.form[param[0]] = param[1];
                    }
                }            
            }
        },
        methods: {
            search: function () {
                this.$inertia.get('/dashboard', this.form);
            },
        },
    }
</script>
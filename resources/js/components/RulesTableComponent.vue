<template>
    <div class="rules-table-container">

        <div v-if="showCreateModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <form method="POST" action="/manage/rule">
                            <input type="hidden" name="_token" v-model="csrf"/>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Create a Rule</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Name</label>
                                        <input type="text" name="name" class="form-control" v-model="newRuleName">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" v-on:click="showCreateModal = false">Close</button>
                                    <button type="submit" class="btn btn-primary">Save</button>
                                </div>
                            </div>
                        </div>
                        </form>

                    </div>
                </div>
            </transition>
        </div>

        <button @click="showCreateModal = true" class="btn btn-primary">
            <i class="fas fa-plus"></i> Create Rule
        </button>

        <div class="bg-white shadow-md rounded my-6 table-responsive">
            <datatable :columns="columns" :data="rows">
                <template slot-scope="{ row }">
                    <tr>
                        <td>{{ row.name }}</td>
                        <td>{{ row.number_of_zipcodes }}</td>
                        <td>{{ row.weight_limit_for_quote }}</td>
                        <td>{{ row.mileage_limit_for_quote }}</td>
                        <td>{{ row.availability_status }}</td>
                        <td class="text-right">
                            <a v-bind:href="'/manage/rule/'+row.uuid+'/edit'" class="inline-block no-underline leading-none text-white font-semibold px-4 py-2 border-none rounded whitespace-no-wrap bg-brand text-xs" @click="window.alert('click')">
                                <i class="fas fa-edit"></i> Edit
                            </a>
                        </td>
                    </tr>
                </template>
            </datatable>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['data','csrf'],
        data: function () {
            return {
                showCreateModal: false,
                newRuleName: null,
                columns: [
                    { label: 'Rule Name', field: 'name' },
                    { label: 'Number of Zipcodes', field: 'number_of_zipcodes', filterable: false },
                    { label: 'Weight Limit (lbs.)', field: 'weight_limit_for_quote', filterable: false },
                    { label: 'Mileage Limit (miles)', field: 'mileage_limit_for_quote', filterable: false },
                    { label: 'Availability Status', field: 'availability_status' },
                    { label: '', field: '', align: 'right', sortable: false }
                ],
                rows: []
            }
        },
        mounted() {
            this.rows = JSON.parse(this.data);
        },
        methods:{

        }
    }
</script>

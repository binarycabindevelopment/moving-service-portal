<template>
    <div class="rules-table-container">

        <div v-if="showCreateModal">
            <transition name="modal">
                <div class="modal-mask">
                    <div class="modal-wrapper">
                        <form method="POST" v-bind:action="'/manage/rule/'+rule.uuid+'/location'">
                            <input type="hidden" name="_token" v-model="csrf"/>
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h3 class="modal-title">Add Location</h3>
                                </div>
                                <div class="modal-body">
                                    <div class="form-group">
                                        <label>Applicable Zipcode(s)</label>
                                        <textarea name="zipcodes" class="form-control" rows="4" v-model="newLocationZipcodes"></textarea>
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
            <i class="fas fa-plus"></i> Add Location
        </button>

        <div class="bg-white shadow-md rounded my-6 table-responsive">
            <datatable :columns="columns" :data="rows">
                <template slot-scope="{ row }">
                    <tr>
                        <td>{{ row.zipcode }}</td>
                        <td class="text-right">
                            <form method="POST" v-bind:action="'/manage/rule/'+rule.uuid+'/location/'+row.uuid">
                                <input type="hidden" name="_method" value="DELETE"/>
                                <input type="hidden" name="_token" v-model="csrf"/>
                                <button type="submit" class="inline-block no-underline leading-none text-white font-semibold px-4 py-2 border-none rounded whitespace-no-wrap bg-red text-xs">
                                    <i class="fas fa-trash"></i> Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                </template>
            </datatable>
        </div>

    </div>
</template>

<script>
    export default {
        props: ['data','csrf','rule'],
        data: function () {
            return {
                showCreateModal: false,
                newLocationZipcodes: null,
                columns: [
                    { label: 'Zipcode', field: 'zipcode' },
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

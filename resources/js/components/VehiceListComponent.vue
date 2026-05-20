<template>
    <div id="vehicleListVue">
        @vite('resources/js/app.js')

        <main class="nxl-container">
            <div class="nxl-content">
            <!-- [ page-header ] start -->
              <div class="page-header d-flex align-items-center justify-content-between">
                <div class="page-header-left d-flex align-items-center gap-2">
                    <a href="{{ url('vehicle/export') }}" class="btn btn-sm btn-info">
                        <i class="bi bi-file-earmark-excel"></i> Export Excel
                    </a>

                    <a href="" class="btn btn-sm btn-dark">
                        <i class="bi bi-file-earmark-pdf"></i> Download PDF
                    </a>
                </div>

                <div class="page-header-left d-flex align-items-center gap-2">
                    <div class="page-header-right ms-auto">
                        <form method="get" action="">
                           
                            <div class="d-flex align-items-center gap-2">
                                <input class="form-control" type="text" name="filter" 
                                    value="" id="filter" placeholder="Search...">
                                <div class="col-auto">
                                    <button class="btn btn-sm btn-primary"><i class="bi bi-search"></i> Search</button>
                                </div>
                            </div>
                        </form>
                    </div>

                    <a :href=" '/vue/vehicle-list'" class="btn btn-sm btn-success">
                        <i class="feather-plus me-2"></i>
                        <span>Add New</span>
                    </a>
                </div>
            </div>

            <div class="main-content">  
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                        <div class="card-body">
                        <div class="card-body custom-card-action p-0">
                            <div class="table-responsive">
                                <table  class="table table-hover mb-0">
                                    <thead>
                                        <tr class="border-b">
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col" >SL No</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Employee Name</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Model Name</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Brand Name</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Engine No</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Chassis No</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Registration No</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Location</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Receive Date</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Usage Duration</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">is loan?</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Registration Date</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Registration Duration</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Motor Cycle Status</th>
                                            <th style="font-size:14px; width:5%; white-space: nowrap; text-transform: capitalize;" scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <!-- DATA -->
                                        <tr v-for="(obj, index) in vehicles.data" :key="obj.id">
                                            <td>{{ index + 1 }}</td>
                                            <td>{{ obj.emp_name }}</td>
                                            <td>{{ obj.model_name }}</td>
                                            <td>{{ obj.brand_name }}</td>
                                            <td>{{ obj.eng_no }}</td>
                                            <td>{{ obj.chassis_no }}</td>
                                            <td>{{ obj.registration_number }}</td>
                                            <td>{{ obj.location }}</td>
                                            <td>{{ obj.receive_date }}</td>
                                            <td>{{ obj.total_receive_duration }}</td>
                                            <td>
                                                <span v-if="obj.is_loan == 0" class="text-danger">Loan</span>
                                                <span v-else class="text-success">Cash</span>
                                            </td>

                                            <td>{{ obj.reg_date }}</td>
                                            <td>{{ obj.total_reg_duration }}</td>
                                            <td>{{ obj.mc_status }}</td>
                                            <td>
                                                <router-link
                                                    :to="`/vehicle/view/${obj.id}`"
                                                    class="btn btn-sm btn-primary me-1"
                                                >
                                                    <i class="bi bi-eye"></i> View
                                                </router-link>

                                                <router-link
                                                    :to="`/vehicle/edit/${obj.id}`"
                                                    class="btn btn-sm btn-info me-1"
                                                >
                                                    <i class="bi bi-pencil-square"></i> Edit
                                                </router-link>

                                                <button class="btn btn-sm btn-warning me-1" @click="updateStatus(obj.id)">
                                                    <i class="bi bi-arrow-left-right"></i> Transfer
                                                </button>
                                                <button class="btn btn-sm btn-danger" @click="deleteVehicle(obj.id)">
                                                    <i class="bi bi-trash"></i> Delete
                                                </button>
                                            </td>
                                        </tr>

                                        <!-- EMPTY -->
                                        <tr v-if="vehicles.length === 0">
                                            <td colspan="16" class="text-center">
                                                There are no data found.
                                            </td>
                                        </tr>
                                    </tbody>
                            </table>
                              
                        </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
                </div>
            </div>
           
        </main>
            
    </div>
</template>

<script setup>
import { ref, onMounted } from 'vue'
import axios from 'axios'

//update transfer status
const updateStatus = async (id) => {
    
    if (!confirm('Are you sure you want to transfer this vehicle?')) return;
    try {
        const res = await axios.post('/vue/vehicle/update-status', { id });
        if (res.data.success) {
            alert(res.data.message);
            loadVehicles();
        }
    } catch (error) {
        console.error(error);
        alert('Failed to update status');
    }
};

// Delete vehicle
const deleteVehicle = async (id) => {
    if (!confirm('Are you sure you want to delete this vehicle?')) return;

    try {
        const res = await axios.delete(`/vue/vehicle/${id}`);
        if (res.data.success) {
            //alert(res.data.message); // show success message
            loadvehicle(); // reload vehicle list dynamically
        } else {
            alert(res.data.message); // show error message
        }
    } catch (error) {
        console.error(error);
        alert('Failed to delete vehicle');
    }
};

// data list show
const vehicles = ref([])
const loadVehicles = async () => {
    try {
        const res = await axios.get('/vue/vehicle-data')
        vehicles.value = res.data
        console.log(vehicles.value)
    } catch (error) {
        console.error(error)
    }
}
onMounted(loadVehicles)

</script>



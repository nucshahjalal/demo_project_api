<template>
    <div id="app">
        @vite('resources/js/app.js')

        <main class="nxl-container">
            <div class="nxl-content">
                <!-- [ page-header ] start -->
            <div class="page-header">
                    <div class="page-header-left d-flex align-items-center">                    
                        <ul class="breadcrumb">
                            <h3 style="text-align: center !important;"> Manage Vehicle Information</h3>
                        </ul>
                        
                    </div>
                    <h2 style="text-align: center; margin-left: 30%;color:green;">
                        <p v-if="successMessage" class="text-green-600 text-center">
                            {{ successMessage }}
                        </p>
                    </h2>
                    <div class="page-header-right ms-auto">
                        <div class="page-header-right-items">
                            <div class="d-flex d-md-none">
                                <a href="javascript:void(0)" class="page-header-right-close-toggle">
                                    <i class="feather-arrow-left me-2"></i>
                                    <span>Back</span>
                                </a>
                            </div>
                            <div class="d-flex align-items-center gap-2 page-header-right-items-wrapper">
                                <a :href=" '/vue/vehicle'" class="btn btn-sm btn-success">
                                   ← Back
                                </a>
                            </div>
                        </div>
                        <div class="d-md-none d-flex align-items-center">
                            <a href="javascript:void(0)" class="page-header-right-open-toggle">
                                <i class="feather-align-right fs-20"></i>
                            </a>
                        </div>
                    </div>
                </div>
            <div class="main-content">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="card stretch stretch-full">
                            <div class="card-body">
                                <form @submit.prevent="submitForm">
                                    

                                    <div class="row">     
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Employee Name <span class="text-danger">*</span></label>
                                            <select class="form-control" v-model="form.emp_id"  id="emp_id" data-select2-selector="icon">
                                                <option value="">--Select--</option> 
                                                <option v-for="employee in employees" :key="employee.id" :value="employee.id">
                                                    {{ employee.name }} ({{ employee.emp_id }})
                                                </option>
                                            </select>
                                            <div>
                                                <p v-if="errors.emp_id" style="color: red" class="text-red-500 text-sm">
                                                    {{ errors.emp_id[0] }}
                                                </p>
                                            </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Product <span class="text-danger">*</span></label>
                                            <select v-model="form.product_id" class="form-control"  id="product_id" data-select2-selector="icon">
                                                <option value="">--Select--</option> 
                                                <option v-for="product in products" :key="product.id" :value="product.id">
                                                    {{ product.eng_no }} ({{ product.chassis_no }})
                                                </option>
                                            </select>
                                            <div>
                                                <p v-if="errors.product_id" style="color: red" class="text-red-500 text-sm">
                                                    {{ errors.product_id[0] }}
                                                </p>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">     
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Portfolio <span class="text-danger">*</span></label>
                                                <select v-model="form.portfolio_id" class="form-control" id="portfolio_id" data-select2-selector="icon">
                                                    <option value="">--Select--</option> 
                                                    <option v-for="portfolio in portfolios" :key="portfolio.id" :value="portfolio.id">
                                                    {{ portfolio.name }} 
                                                    </option>
                                                </select>
                                                <div>
                                                    <p v-if="errors.portfolio_id" style="color: red" class="text-red-500 text-sm">
                                                        {{ errors.portfolio_id[0] }}
                                                    </p>
                                                </div>
                                        </div>

                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Location </label>
                                            <input v-model="form.location" class="form-control" type="text"  value="" id="location" placeholder="Location">
                                            <div>
                                            </div>
                                        </div>     
                                    </div>

                                    <div class="row">     
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label"> Receive Date </label>
                                            <input  ref="receiveDate"  v-model="form.receive_date" class="form-control" type="text" value="" placeholder="Receive Date">
                                        </div>
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">Motor Cycle Status </label>
                                            <select  v-model="form.mc_status" class="form-control" id="mc_status" data-select2-selector="icon">
                                                <option value=""> --Select-- </option>
                                                <option v-for="mc_status in status" :key="mc_status.id" :value="mc_status">
                                                    {{ mc_status }} 
                                                </option>
                                            </select>
                                        </div>
                                            
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-6 mb-3">
                                            <label class="form-label">is loan? </label>
                                            <select   v-model="form.is_loan" class="form-control" id="is_loan" data-select2-selector="icon">
                                                <option value=""> --Select-- </option>
                                                    <option value="0"> Loan</option>
                                                    <option value="1"> Cash</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div style="text-align:center;" class="row">      
                                        <div class="col-lg-12 mb-7 ">
                                            <button  type="submit" class="btn btn-success">Submit</button>
                                        </div> 
                                    </div>
                                </form>
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
    import { reactive, ref, onMounted } from 'vue'
    import axios from 'axios'
    import flatpickr from 'flatpickr'
    import 'flatpickr/dist/flatpickr.css'

    // Reactive form
    const form = reactive({
        emp_id: '',
        product_id: '',
        portfolio_id: '',
        location: '',
        receive_date: '',
        mc_status: '',
        is_loan: '',
    })

    // Validation errors
    const errors = ref({})

    // Success message
    const successMessage = ref('')

    const employees = ref([])
    onMounted(async () => {
        try {
            const res = await axios.get('/api/employees')
            employees.value = res.data
        } catch (error) {
            console.error('Failed to load employees', error)
        }
    })

    const products = ref([])
    onMounted(async () => {
        try {
            const res = await axios.get('/api/products')
            products.value = res.data
        } catch (error) {
            console.error('Failed to load products', error)
        }
    })

    const portfolios = ref([])
    onMounted(async () => {
        try {
            const res = await axios.get('/api/portfolios')
            portfolios.value = res.data
        } catch (error) {
            console.error('Failed to load portfolios', error)
        }
    })

    const status = ref([])
    onMounted(async () => {
        try {
            const res = await axios.get('/vue/status_list')
            status.value = res.data
        } catch (error) {
            console.error('Failed to load status', error)
        }
    })

    // package install date calender = npm install flatpickr
    const receiveDate = ref(null)
    onMounted(() => {
    flatpickr(receiveDate.value, {
        dateFormat: 'Y-m-d',
        altInput: true,
        altFormat: 'F j, Y',
       // maxDate: 'today',
       // defaultDate: 'today',
        onChange: (selectedDates, dateStr) => {
            form.receive_date = dateStr
        }
        })
    })

    // Submit form function
    const submitForm = async () => {
        errors.value = {}
        successMessage.value = ''

        try {
            await axios.post('/vehicle/save', form)
            successMessage.value = 'Vehicle saved successfully'

            setTimeout(() => {
                window.location.href = '/vue/vehicle-list'
            }, 1500)

        } catch (error) {
            if (error.response && error.response.status === 422) {
                errors.value = error.response.data.errors
            } else {
                alert('Something went wrong')
            }
        }
    }

</script> 

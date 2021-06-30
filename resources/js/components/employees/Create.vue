<template>
  <div class="container">
    <div>
      <h1 class="h3 mb-0 text-gray-800 my-2">Employee</h1>
    </div>
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">
            <strong>Register Employee</strong>
            <router-link :to="{ name: 'EmployeesIndex' }" class="float-right">
              <button class="btn btn-sm btn-info">Go back</button>
            </router-link>
          </div>
          <div class="card-body">
            <form @submit.prevent="storeEmployee">
              <div class="form-group row">
                <label
                  for="first_name"
                  class="col-md-4 col-form-label text-md-right"
                  >First Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.first_name"
                    id="first_name"
                    type="text"
                    class="form-control"
                    required
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="middle_name"
                  class="col-md-4 col-form-label text-md-right"
                  >Middle Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.middle_name"
                    id="middle_name"
                    type="text"
                    class="form-control"
                    required
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="last_namename"
                  class="col-md-4 col-form-label text-md-right"
                  >Last Name</label
                >

                <div class="col-md-6">
                  <input
                    v-model="form.last_name"
                    id="last_name"
                    type="text"
                    class="form-control"
                    required
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="department"
                  class="col-md-4 col-form-label text-md-right"
                  >Department</label
                >

                <div class="col-md-6">
                  <select
                    v-model="form.department_id"
                    name="department"
                    class="form-control"
                  >
                    <option
                      v-for="department in departments"
                      :key="department.id"
                      :value="department.id"
                    >
                    {{ department.name}}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="address"
                  class="col-md-4 col-form-label text-md-right"
                  >Address</label
                >

                <div class="col-md-6">
                  <textarea
                    v-model="form.address"
                    id="address"
                    class="form-control"
                    required
                  ></textarea>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="country"
                  class="col-md-4 col-form-label text-md-right"
                  >Country</label
                >

                <div class="col-md-6">
                  <select
                    v-model="form.country_id"
                    @change="getStates()"
                    name="country"
                    class="form-control"
                  >
                    <option
                      v-for="country in countries"
                      :key="country.id"
                      :value="country.id"
                    >
                      {{ country.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="state" class="col-md-4 col-form-label text-md-right"
                  >State</label
                >

                <div class="col-md-6">
                  <select
                    v-model="form.state_id"
                    @change="getCities()"
                    name="state"
                    class="form-control"
                  >
                    <option
                      v-for="state in states"
                      :key="state.id"
                      :value="state.id"
                    >
                      {{ state.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label for="city" class="col-md-4 col-form-label text-md-right"
                  >City</label
                >

                <div class="col-md-6">
                  <select
                    v-model="form.city_id"
                    name="city"
                    class="form-control"
                  >
                    <option
                      v-for="city in cities"
                      :key="city.id"
                      :value="city.id"
                    >
                      {{ city.name }}
                    </option>
                  </select>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="zip_code"
                  class="col-md-4 col-form-label text-md-right"
                  >Zip code</label
                >

                <div class="col-md-6">
                  <input
                  v-model="form.zip_code"
                    id="zip_code"
                    type="text"
                    class="form-control"
                    required
                  />
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="birthdate"
                  class="col-md-4 col-form-label text-md-right"
                  >Birth Date</label
                >

                <div class="col-md-6">
                  <datepicker v-model="form.birthdate" input-class="form-control"></datepicker>
                </div>
              </div>

              <div class="form-group row">
                <label
                  for="date_hired"
                  class="col-md-4 col-form-label text-md-right"
                  >Date Hired</label
                >

                <div class="col-md-6">
                  <datepicker v-model="form.date_hired" input-class="form-control"></datepicker>
                </div>
              </div>

              <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Register
                  </button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";
import moment from 'moment';
export default {
  components: {
    Datepicker,
  },
  data() {
    return {
      countries: [],
      states: [],
      cities: [],
      departments: [],
      form: {
        first_name: "",
        last_name: "",
        middle_name: "",
        address: "",
        country_id: "",
        state_id: "",
        department_id: "",
        city_id: "",
        zip_code: "",
        birthdate: null,
        date_hired: null,
      },
    };
  },
  methods: {
    getCountries() {
      axios
        .get("http://127.0.0.1:8000/api/employees/countries")
        .then((res) => {
          this.countries = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },

    getStates() {
      axios
        .get(
          "http://127.0.0.1:8000/api/employees/" +
            this.form.country_id +
            "/states"
        )
        .then((res) => {
          this.states = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getCities() {
      axios
        .get(
          "http://127.0.0.1:8000/api/employees/" +
            this.form.state_id +
            "/cities"
        )
        .then((res) => {
          this.cities = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    getDepartments() {
      axios
        .get("http://127.0.0.1:8000/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    storeEmployee(){
      axios.post("http://127.0.0.1:8000/api/employees", {
        first_name: this.form.first_name,
        middle_name: this.form.middle_name,
        last_name: this.form.last_name,
        department_id: this.form.department_id,
        address: this.form.address,
        country_id: this.form.country_id,
        state_id: this.form.state_id,
        city_id: this.form.city_id,
        zip_code: this.form.zip_code,
        birthdate: this.format_date(this.form.birthdate),
        date_hired: this.format_date(this.form.date_hired)        
      })
      .then((res) => {
        this.$router.push({name: 'EmployeesIndex'})
      })
      
    },
    format_date(value){
      if(value) {
        return moment(String(value)).format("YYYYMMDD")
      }
    },
  },
  mounted() {
    this.getCountries();
    this.getStates();
    this.getCities();
    this.getDepartments();
  },
};
</script>

<style>
</style>
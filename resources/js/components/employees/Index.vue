<template>
  <div class="container">
    <div>
      <h1 class="h3 mb-0 text-gray-800 my-2">Employees</h1>
    </div>
    <div class="row">
      <div class="col">
        <div class="card">
          <div v-if="showMessage">
            <div class="alert alert-success">{{ message }}</div>
          </div>
          <div class="card-header">
            <div class="d-flex justify-content-between">
              <div class="col">
                <form action="" method="GET" class="my-0">
                  <div class="form-row align-items-between">
                    <div class="col-md-6">
                      <input
                        type="search"
                        v-model.lazy="search"
                        class="form-control mb-2 mr-sm-5"
                        id="inlineFormInput"
                        placeholder="John"
                      />
                    </div>
                    <div class="col">
                      <button type="submit" class="btn btn-primary mb-2">
                        Search
                      </button>
                    </div>
                    
                  </div>
                </form>
              </div>
              <div class="col-md-3">
                  <select
                    v-model="selectedDepartment"
                    name="department"
                    class="form-control"
                  >
                    <option
                      v-for="department in departments"
                      :key="department.id"
                      :value="department.id"
                    >
                      {{ department.name }}
                    </option>
                  </select>
                </div>
              <div>
                <router-link
                  :to="{ name: 'EmployeesCreate' }"
                  class="float-right"
                >
                  <button class="btn btn-primary">Register New Employee</button>
                </router-link>
              </div>
            </div>
          </div>
          <div class="card-body">
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#Id</th>
                  <th scope="col">First Name</th>
                  <th scope="col">Last Name</th>
                  <th scope="col">Address</th>
                  <th scope="col">Department</th>
                  <th scope="col">Manage</th>
                </tr>
              </thead>
              <tbody>
                <tr v-for="employee in employees" :key="employee.id">
                  <th>{{ employee.id }}</th>
                  <td>{{ employee.first_name }}</td>
                  <td>{{ employee.last_name }}</td>
                  <td>{{ employee.address }}</td>
                  <td>{{ employee.department.name }}</td>
                  <td>
                    <router-link
                      :to="{
                        name: 'EmployeesEdit',
                        params: { id: employee.id },
                      }"
                      class="btn btn-success"
                    >
                      Edit
                    </router-link>
                    <button
                      class="btn btn-danger"
                      @click="deleteEmployee(employee.id)"
                    >
                      Delete
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      employees: [],
      showMessage: false,
      message: '',
      search: null,
      selectedDepartment: null,
      departments: []
    };
  },
  mounted() {
    this.getEmployees()
    this.getDepartments()
  },
  methods: {
    getEmployees() {
      axios
        .get("http://127.0.0.1:8000/api/employees", {params: {
            search: this.search,
            department_id: this.selectedDepartment
        }})
        .then((res) => {
          this.employees = res.data.data;
        })
        .catch((err) => {
          console.log(err);
        });
    },
    deleteEmployee(id){
        axios.delete("http://127.0.0.1:8000/api/employees/" + id)
        .then((res) => {
            this.showMessage = true
            this.message = res.data
            this.getEmployees()
        })
    },
    getDepartments(){
        axios
        .get("http://127.0.0.1:8000/api/employees/departments")
        .then((res) => {
          this.departments = res.data;
        })
        .catch((err) => {
          console.log(err);
        });
    }
  },
  watch: {
      search(){
          this.getEmployees()
      },
      selectedDepartment(){
          this.getEmployees()
      }
  }
};
</script>

<style>
</style>
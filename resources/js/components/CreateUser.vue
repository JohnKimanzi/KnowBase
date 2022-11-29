<template>
  <div class="card">
    <div class="row card-body">
      <div class="col-lg-12">
        <form v-loading="loading" @submit.prevent="createUser" method="POST">
          <div class="tab-content profile-tab-content">
            <!-- personal_info Tab -->
            <div v-if="step === 0" id="personal_info" class="">
              <div style="margin-bottom: 50px">
                <h2>Personal Details</h2>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label"
                      >First Name <span class="text-danger">*</span></label
                    >
                    <input
                      v-model="fName"
                      class="form-control"
                      required
                      name="fname"
                      autocomplete="fname"
                      type="text"
                      autofocus
                      id="fname"
                    />
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label">Middle Name </label>
                    <input
                      v-model="mName"
                      class="form-control"
                      name="mname"
                      autocomplete="mname"
                      type="text"
                      autofocus
                      id="mname"
                    />
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Last Name <span class="text-danger">*</span></label
                    >
                    <input
                      v-model="lName"
                      class="form-control"
                      required
                      name="lname"
                      autocomplete="lname"
                      type="text"
                      autofocus
                      id="lname"
                    />
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Date of birth <span class="text-danger">*</span></label
                    >
                    <input
                      v-model="dob"
                      class="form-control"
                      required
                      name="dob"
                      autocomplete="dob"
                      type="date"
                      id="dob"
                    />
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label"
                      >National ID<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="national_id"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label">Gender</label>
                    <select
                      v-model="gender"
                      class="form-control"
                      required
                      name="gender_id"
                    >
                      <option
                        :value="gender.id"
                        v-for="(gender, index) in genderData"
                        :key="index"
                      >
                        {{ gender.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label">Country</label>
                    <select
                      v-model="country"
                      class="form-control"
                      required
                      name="country_id"
                    >
                      <option
                        :value="country.id"
                        v-for="(country, index) in countryData"
                        :key="index"
                      >
                        {{ country.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-3">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Personal Email<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="personal_email"
                      name="personal_email"
                      class="form-control"
                      required
                      autocomplete="username"
                      type="email"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Primary Phone<span class="text-danger">*</span></label
                    >
                    <vue-phone-number-input
                      v-model="phone1"
                      default-country-code="KE"
                      color="#FF0000"
                      :only-countries="[
                        'KE',
                        'UG',
                        'TZ',
                        'MW',
                        'GH',
                        'ET',
                        'RW',
                        'ZM',
                      ]"
                    ></vue-phone-number-input>
                  </div>
                </div>
                <div class="col-sm-6">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Secondary Phone<span class="text-danger">*</span></label
                    >
                    <vue-phone-number-input
                      v-model="phone2"
                      color="#FF0000"
                      default-country-code="KE"
                      :only-countries="[
                        'KE',
                        'UG',
                        'TZ',
                        'MW',
                        'GH',
                        'ET',
                        'RW',
                        'ZM',
                      ]"
                    ></vue-phone-number-input>
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row">
                  <div class="col-12">
                    <button
                      @click="goToEducationDetails"
                      class="btn btn-success submit-btn col-12"
                    >
                      Next
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--/Personal info Tab-->

            <!--Education Tab-->
            <div v-if="step === 1">
              <button @click="addEducationLevel" class="btn btn-primary btn-sm">
                ADD EDUCATION DETAILS
              </button>
              <div
                v-if="educationLevelsDataArray.length > 0"
                v-for="(input, index) in educationLevelsDataArray"
                :key="index"
                class="row"
              >
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Education Level</label>
                    <select
                      v-model="input.educationLevel"
                      class="form-control"
                      required
                      name="educationLevel"
                    >
                      <option
                        :value="level.id"
                        v-for="(level, index) in educationLevelsData"
                        :key="index"
                      >
                        {{ level.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Institution<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.educationInstitution"
                      name="educationInstitution"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Field of Study<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.educationFieldOfStudy"
                      name="educationFieldOfStudy"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Grade</label>
                    <input
                      v-model="input.educationGrade"
                      name="educationGrade"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>

                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Start Date<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.educationStart"
                      name="educationStart"
                      class="form-control"
                      required
                      type="date"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >End Date<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.educationEnd"
                      name="educationEnd"
                      class="form-control"
                      required
                      type="date"
                      autofocus
                    />
                  </div>
                </div>

                <div class="col-sm-12 col-lg-4 col-md-4 col-xl-4">
                  <button
                    class="btn btn-danger col-12"
                    type="button"
                    @click="removeEducation(index)"
                  >
                    REMOVE
                  </button>
                </div>
              </div>
              <div style="margin-top: 30px" class="col-12">
                <div class="row justify-content-between">
                  <div class="col-4">
                    <button
                      @click="back"
                      class="btn btn-primary submit-btn col-12"
                    >
                      BACK
                    </button>
                  </div>
                  <div class="col-4">
                    <button
                      @click="gotToWorkExperience"
                      class="btn btn-success submit-btn col-12"
                    >
                      Next
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--/Education Tab-->

            <!--Work Experience Status and Years-->
            <div v-if="step === 2">
              <div style="margin-bottom: 50px">
                <h2>Work Experience</h2>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Do you have any work experience?</label
                    >
                    <el-switch
                      v-model="workExperienceStatus"
                      active-color="#13ce66"
                      inactive-color="#ff4949"
                    >
                    </el-switch>
                  </div>
                </div>
                <div v-if="workExperienceStatus" class="col-sm-6">
                  <label class="col-form-label"
                    >Years worked<span class="text-danger">*</span></label
                  >
                  <input
                    v-model="yearsWorkedDetails"
                    class="form-control mb-2"
                    required
                    type="number"
                    autofocus
                  />
                </div>
                <div class="col-12">
                  <div class="row justify-content-between">
                    <div class="col-4">
                      <button
                        @click="back"
                        class="btn btn-primary submit-btn col-12"
                      >
                        BACK
                      </button>
                    </div>
                    <div class="col-4">
                      <button
                        @click="goToExperienceInfo"
                        class="btn btn-success submit-btn col-12"
                      >
                        Next
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/Work Experience Status and Years-->

            <!--Work Experience Info-->
            <div v-if="step === 3">
              <button @click="addWorkExperience" class="btn btn-primary btn-sm">
                Add Work Experience
              </button>
              <div
                v-if="workExperienceDataArray.length > 0"
                v-for="(input, index) in workExperienceDataArray"
                :key="index"
                class="row"
              >
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Company Name<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.workExperienceCompanyName"
                      name="workExperienceCompanyName"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Start Date<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.workExperienceStart"
                      class="form-control"
                      name="workExperienceStart"
                      required
                      type="date"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >End Date<span class="text-danger">*</span></label
                    >
                    <input
                      v-model="input.workExperienceEnd"
                      class="form-control"
                      name="workExperienceEnd"
                      required
                      type="date"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Brief Description of your previous role<span
                        class="text-danger"
                        >*</span
                      ></label
                    >
                    <input
                      v-model="input.workExperienceDescription"
                      name="workExperienceDescription"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>
                <div class="col-sm-12 col-md-4 col-lg-4 col-xl-4">
                  <button
                    class="btn btn-danger col-12"
                    type="button"
                    @click="removeWorkExperience(index)"
                  >
                    REMOVE
                  </button>
                </div>
              </div>
              <div style="margin-top: 30px" class="col-12">
                <div class="row justify-content-between">
                  <div class="col-4">
                    <button
                      @click="back"
                      class="btn btn-primary submit-btn col-12"
                    >
                      BACK
                    </button>
                  </div>
                  <div class="col-4">
                    <button
                      @click="goToWorkingStatus"
                      class="btn btn-success submit-btn col-12"
                    >
                      Next
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--/Working experience Tab-->

            <!--Working status Tab-->
            <div v-if="step === 4">
              <div style="margin-bottom: 50px">
                <h2>Working Status</h2>
              </div>
              <div class="row">
                <div class="col-sm-12">
                  <div class="form-group">
                    <label class="col-form-label">Currently Working?</label>
                    <el-switch
                      v-model="currentWorkingStatus"
                      active-color="#13ce66"
                      inactive-color="#ff4949"
                    >
                    </el-switch>
                  </div>
                </div>

                <div v-if="currentWorkingStatus" class="col-sm-12">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Why Look for a Change?<span class="text-danger"
                        >*</span
                      ></label
                    >
                    <input
                      v-model="changeWorkDetails"
                      class="form-control"
                      required
                      type="text"
                      autofocus
                    />
                  </div>
                </div>
              </div>
              <div class="col-12">
                <div class="row justify-content-between">
                  <div class="col-4">
                    <button
                      @click="back"
                      class="btn btn-primary submit-btn col-12"
                    >
                      BACK
                    </button>
                  </div>
                  <div class="col-4">
                    <button
                      @click="goToOtherDetails"
                      class="btn btn-success submit-btn col-12"
                    >
                      Next
                    </button>
                  </div>
                </div>
              </div>
            </div>
            <!--/Working status Tab-->

            <!--Other Details Tab-->
            <div v-if="step === 5">
              <div style="margin-bottom: 50px">
                <h2>Other Details</h2>
              </div>
              <div class="row">
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Parents Occupation<span class="text-danger"
                        >*</span
                      ></label
                    >
                    <input
                      v-model="poccupation"
                      class="form-control"
                      required
                      name="poccupation"
                      autocomplete="poccupation"
                      type="text"
                      autofocus
                      id="poccupation"
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label">Marital Status</label>
                    <select
                      v-model="marital_status"
                      class="form-control"
                      required
                      name="marital_status_id"
                    >
                      <option
                        :value="marital_status.id"
                        v-for="(marital_status, index) in marital_statusData"
                        :key="index"
                      >
                        {{ marital_status.name }}
                      </option>
                    </select>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >No. of Dependants
                      <span class="text-danger">*</span></label
                    >
                    <input
                      v-model="dependants"
                      class="form-control"
                      name="dependants"
                      autocomplete="dependants"
                      type="text"
                      autofocus
                      id="dependants"
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Ready to work in Night Shifts?</label
                    >
                    <el-switch
                      v-model="nightShiftStatus"
                      active-color="#13ce66"
                      inactive-color="#ff4949"
                    >
                    </el-switch>
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >Salary Expectations
                      <span class="text-danger">*</span></label
                    >
                    <input
                      v-model="salary"
                      class="form-control"
                      name="salary"
                      autocomplete="salary"
                      type="text"
                      autofocus
                      id="salary"
                    />
                  </div>
                </div>
                <div class="col-sm-4">
                  <div class="form-group">
                    <label class="col-form-label"
                      >How did you hear about this job?</label
                    >
                    <select
                      v-model="reference"
                      class="form-control"
                      required
                      name="reference_id"
                    >
                      <option
                        :value="reference.id"
                        v-for="(reference, index) in referenceData"
                        :key="index"
                      >
                        {{ reference.name }}
                      </option>
                    </select>
                    <!-- Research on options design. our options(friends,relative,client,others,existing employee)-->
                  </div>
                </div>
                <div class="col-12">
                  <div class="row justify-content-between">
                    <div class="col-4">
                      <button
                        @click="back"
                        class="btn btn-primary submit-btn col-12"
                      >
                        BACK
                      </button>
                    </div>
                    <div class="col-4">
                      <button
                        @click="createUser"
                        class="btn btn-success submit-btn col-12"
                        type="submit"
                      >
                        Register User
                      </button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!--/Other Details Tab-->
          </div>
        </form>
      </div>
    </div>
  </div>
</template>
<script>
import ElementUI from "element-ui";
export default {
  name: "create-user",
  props: {
    users: Array,
    countries: Array,
    references: Array,
    genders: Array,
    marital_statuses: Array,
    // work_experiences: Array,
    education_levels: Array,
  },
  data() {
    return {
      loading: false,
      userData: this.users,
      step: 0,
      countryData: this.countries,
      referenceData: this.references,
      genderData: this.genders,
      marital_statusData: this.marital_statuses,
      educationLevelsData: this.education_levels,
      //   workExperienceData: this.work_experiences,
      fName: null,
      lName: null,
      mName: null,
      dob: null,
      gender: null,
      marital_status: null,
      country: null,
      reference: null,
      personal_email: null,
      salary: null,
      national_id: null,
      dependants: null,
      phone1: "",
      phone2: "",

      yearsWorkedDetails: null,
      changeWorkDetails: null,
      poccupation: null,
      currentWorkingStatus: false,
      nightShiftStatus: false,
      workExperienceStatus: false,
      educationLevelsDataArray: [],
      workExperienceDataArray: [],
    };
  },
  methods: {
    removeEducation(index) {
      this.educationLevelsDataArray.splice(index, 1);
    },

    removeWorkExperience(index) {
      this.workExperienceDataArray.splice(index, 1);
    },

    back() {
      if (this.step !== 0) {
        this.step--;
      } else {
        this.step = 0;
      }
    },
    goToEducationDetails() {
      if (!this.fName) {
        this.$message.error("Please enter first name.");
      } else if (!this.lName) {
        this.$message.error("Please enter last name.");
      } else if (!this.national_id) {
        this.$message.error("Please enter national ID");
      } else if (!this.dob) {
        this.$message.error("Please enter date of birth.");
      } else if (!this.gender) {
        this.$message.error("Please select gender.");
      } else if (!this.country) {
        this.$message.error("Please select country.");
      } else if (!this.personal_email) {
        this.$message.error("Please enter personal email.");
      } else if (!this.phone1) {
        this.$message.error("Please enter primary phone number.");
      } else {
        this.step = 1;
      }
    },
    addEducationLevel() {
      this.educationLevelsDataArray.push({
        educationLevels: null,
        educationInstitution: null,
        educationFieldOfStudy: null,
        educationGrade: null,
        educationStart: null,
        educationEnd: null,
      });
    },
    gotToWorkExperience() {
      if (this.educationLevelsDataArray <= 0) {
        this.$message.error("Please add your education history");
      } else {
        this.step = 2;
      }
    },
    goToExperienceInfo() {
      this.step = 3;
    },
    addWorkExperience() {
      this.workExperienceDataArray.push({
        workExperienceCompanyName: null,
        workExperienceStart: null,
        workExperienceEnd: null,
        workExperienceDescription: null,
      });
    },
    goToWorkingStatus() {
      if (this.workExperienceDataArray <= 0) {
        this.$message.error("Please add work history");
      } else {
      this.step = 4;
      }
    },
    goToOtherDetails() {
      this.step = 5;
    },
    createUser() {
        if (!this.salary) {
          this.$message.error("Please enter your salary expectations");
        }
        else if (!this.dependants) {
          this.$message.error("Please enter the number of dependants");
        } else if (!this.poccupation) {
          this.$message.error("Please enter your parents/guardians occupation");
        } else if (!this.marital_status) {
          this.$message.error("Please enter your marital status");
        } else {
        event.preventDefault();

        this.loading = true;

        const config = {
          headers: {},
        };

        const formData = new FormData();

        formData.append("fname", this.fName);
        formData.append("mname", this.mName);
        formData.append("lname", this.lName);
        formData.append("dob", this.dob);
        formData.append("national_id", this.national_id);
        formData.append("gender_id", this.gender);
        formData.append("country_id", this.country);
        formData.append("personal_email", this.personal_email);
        formData.append("phone1", this.phone1);
        formData.append("phone2", this.phone2);


        formData.append(
          "educationDetails",
          JSON.stringify(this.educationLevelsDataArray)
        );
        if (this.workExperienceStatus) {
          formData.append("work_experience", "1");
        } else {
          formData.append("work_experience", "0");
        }
        formData.append("years_worked", this.yearsWorkedDetails);

        formData.append(
          "workExperience",
          JSON.stringify(this.workExperienceDataArray)
        );
        if (this.currentWorkingStatus) {
          formData.append("current_work", "1");
        } else {
          formData.append("current_Work", "0");
        }
        formData.append("change_work_details", this.changeWorkDetails);
        formData.append("poccupation", this.poccupation);
        formData.append("marital_status_id", this.marital_status);
        formData.append("dependants", this.dependants);
        if (this.nightShiftStatus) {
          formData.append("night_shift", "1");
        } else {
          formData.append("night_shift", "0");
        }
        formData.append("salary", this.salary);
        formData.append("reference_id", this.reference);
        axios.post("/create-user", formData, config).then((resp) => {
          this.loading = false;
          if (resp.data.status) {
            this.$message.success(resp.data.message);

            setTimeout(function () {
              window.location.href = "/assessments";
            }, 1000);
          } else {
            this.$message.error(resp.data.message);
          }
        });
        }
    },
  },
};
</script>


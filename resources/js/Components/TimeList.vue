<template>
  <div>
    <v-row>
      <v-col cols="4" v-for="(time, index) in times" :key="index">
        <v-card @click="selectTime(time)" v-bind:class="{ 'selected': time.value === selectedTime }">
          <v-card-title>{{ time.value }}</v-card-title>
        </v-card>
      </v-col>
    </v-row>
  </div>
</template>
<script>
export default {
  name: "TimeList",
  props: {
    initialTime: String,
    finalTime: String,
    value: {
      type: String
    }
  },
  data() {
    return {
      selectedTime: this.value,
      times: []
    };
  },
  computed: {
    formattedTime() {
      return this.value.replace(/\s/g, "");
    }
  },
  created() {
    this.times = this.generateTimes();
  },
  watch: {
    value(newValue) {
      this.selectedTime = newValue;
      this.setSelectedTime();
    }
  },
  methods: {
    generateTimes() {
      let times = [];
      let [startHour, startMin] = this.initialTime.split(":").map(Number);
      let [endHour, endMin] = this.finalTime.split(":").map(Number);
      for (
        let hour = startHour, min = startMin;
        hour <= endHour;
        min = min === 0 ? 30 : 0, hour += min === 0 ? 1 : 0
      ) {
        let time = {
          value:
            (hour < 10 ? "0" : "") +
            hour.toString() +
            ":" +
            (min === 0 ? "00" : "30"),
          selected: false
        };
        times.push(time);
      }
      this.setSelectedTime();
      return times;
    },
    setSelectedTime() {
      for (let time of this.times) {
        time.selected = time.value === this.formattedTime;
      }
    },
    selectTime(time) {
      for (let t of this.times) {
        t.selected = t.value === time.value;
      }
      this.selectedTime = time.value;
      this.$emit("input", time.value);
      console.log("Valor seleccionado:", this.selectedTime);
    }
  }
};
</script>
<style scoped>
.selected {
  background-color: #1976d2;
  color: white;
}
</style>
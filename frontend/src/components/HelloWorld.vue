<template>
 <div>
    <el-card class="box-card" shadow="hover">
      <div slot="header" class="clearfix">
        <span>Título</span>
      </div>
      <el-table
      :data="tableData"
      style="width: 100%">
        <el-table-column
          sortable
          prop="date"
          align="left"
          label="Date"
          width="180">
        </el-table-column>
        <el-table-column
          prop="name"
          align="left"
          label="Name"
          width="180">
        </el-table-column>
        <el-table-column
          align="left"
          prop="address"
          label="Address">
        </el-table-column>
      </el-table>
    </el-card>
  </div>
</template>

<script>
export default {
  name: 'HelloWorld',
  data () {
    return {
      tableData: [{
        date: '2016-05-03',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-02',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-04',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }, {
        date: '2016-05-01',
        name: 'Tom',
        address: 'No. 189, Grove St, Los Angeles'
      }]
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped>
  .text {
    font-size: 14px;
  }

  .clearfix:before,
  .clearfix:after {
    display: table;
    content: "";
  }
  .clearfix:after {
    clear: both
  }
</style>

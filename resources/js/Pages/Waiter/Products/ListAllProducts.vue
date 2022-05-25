<template>
  <layout>
    <div class="table-responsive-lg">
      <table
        id="myTable"
        class="table table-striped table-bordered table-hover"
        style="width: 100%"
      >
        <thead>
          <tr align="center">
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
          <tr v-for="product in products" :key="product.id" :value="product.id" align="center">
            <td>{{ product.description }}</td>
            <td>{{ product.price }}</td>
            <td align="center">
              <Link :href="'/product/edit/' + product.id"
                ><i class="fas fa-edit"></i
              ></Link>              
              <span
                ><i
                  class="fas fa-trash-alt"
                  @click="sendForm(product.id)"
                ></i
              ></span>
            </td>
          </tr>
        </tbody> 
        <tfoot>
          <tr align="center">
            <th>Descrição</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </tfoot>
      </table>
    </div>

    <!-- <br> temporário -->

    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
    <br /><br /><br /><br /><br />
  </layout>
</template>

<script>
import Layout from "../Layout.vue";
import { Link } from "@inertiajs/inertia-vue";
export default {
  components: {
    Layout,
    Link,
  },
  props: {
    products: Array,
  },
  data: () => {
    return {
      form: {
        id: null,
      },
    };
  },
  methods: {
    sendForm(id) {
      //:href="'/userorador/deletar/'+user.us_id"
      var v = this;
      bootbox.confirm({
        centerVertical: true,
        backdrop: true,
        closeButton: false,
        size: "large",
        title:
          "<h3>Restaurante</h3>",
        message:
          "<i class='fas fa-exclamation-circle' style='color:red'></i></i>&nbsp&nbsp" +
          "<span style='font-weight:bold; position: relative; top: 5px;'>Deletar usuário?</span>",
        buttons: {
          cancel: {
            label: '<i class="fa fa-times"></i> Não',
          },
          confirm: {
            className: "btn-danger",
            label: '<i class="fa fa-check"></i> Sim',
          },
        },
        callback: function (result) {
          if (result == true) {
            v.$inertia.post("/products/delete/"+id, {
              forceFormData: true,
              preserveScroll: false,
              _token: v.$page.props.csrf_token,
            });
            
          }
        },
      });
    },
  },
  mounted() {
    $(document).ready(function () {
      $("#myTable").DataTable({
        language: {
          url: "//cdn.datatables.net/plug-ins/9dcbecd42ad/i18n/Portuguese-Brasil.json",
        },
      });
    });
  },
};
</script>
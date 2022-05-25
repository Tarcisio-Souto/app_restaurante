<template>
  <layout>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Cadastro de Produto</h4>
      </div>
      <div class="col-md-4"></div>
    </div>

    <hr />
    <br />
    <div class="row">
      <div class="col-md-2"></div>
      <div class="col-md-8">
        <form
          id="formProducts"
          @submit.prevent="sendForm"
          enctype="multipart/form-data"
        >
          <input type="hidden" v-model="product.id" />
          <br /><br />
          <br />
          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
              <label for="inputDescription">Descrição</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-briefcase"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputDescription"
                  class="form-control"
                  v-model="form.description"
                  name="txtDescription"
                />
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
          <br />

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
              <label for="inputPrice">Custo</label>
              <div class="input-group">
                <div class="input-group-prepend">
                  <div class="input-group-text">
                    <i class="fas fa-id-card"></i>
                  </div>
                </div>
                <input
                  type="text"
                  id="inputPrice"
                  class="form-control"
                  v-model="form.price"
                  name="txtPrice"
                  v-mask="[
                    'R$ ##.##',
                    'R$ ###.###',
                    'R$ #.###,##',
                    'R$ ##.###,##',
                  ]"
                />
              </div>
            </div>
            <div class="col-md-3"></div>
          </div>
          <div v-for="(erro, price) in errors" :key="price" align="center">
            <div v-if="price == 'price'">
              <span v-if="erro != ''" class="errors-label-notification">
                <i class="fas fa-exclamation-circle"></i>{{ erro }}
              </span>
            </div>
          </div>
          <br />

          <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6" align="center">
              <button type="submit" class="btn btn-success btnCadastrar">
                Alterar
              </button>
            </div>
            <div class="col-md-3"></div>
          </div>
          <br />
        </form>
      </div>
      <div class="col-md-2"></div>
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
    errors: Object,
    product: Array,
  },

  data: () => {
    return {
      form: {
        id: null,
        description: null,
        price: null,
        preserveState: true,
      },
    };
  },

  created() {
    (this.form.id = this.$page.props.product[0].id),
      (this.form.description = this.$page.props.product[0].description),
      (this.form.price = this.$page.props.product[0].price);
  },

  methods: {
    sendForm() {
      this.$inertia.post("/product/update/" + this.form.id, this.form, {
        forceFormData: true,
        preserveScroll: false,
        _token: this.$page.props.csrf_token,
        _method: "PUT",
        onSuccess: () => {
          bootbox.alert({
            centerVertical: true,
            backdrop: true,
            closeButton: false,
            size: "large",
            title: "<h3>Restaurante</h3>",
            message:
              "<i class='fas fa-check-circle' style='color:green'></i>&nbsp&nbsp" +
              "<span style='font-weight:bold; position: relative; top: 5px;'>Cadastro atualizado com sucesso!</span>",
          });
        },
      });
    },
  },
};
</script>
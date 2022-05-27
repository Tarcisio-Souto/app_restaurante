<template>
  <layout>
    <div class="row">
      <div class="col-md-4"></div>
      <div class="col-md-4" align="center">
        <h4>Mesas</h4>
      </div>
      <div class="col-md-4"></div>
    </div>
    <hr />
    <br />
    <div class="row">
      <div class="col-md-4">
        <div class="row topic-chart">
          <div class="col-md-4">
            <p class="title_table">
              <i class="fas fa-caret-down arrow_down1"></i>Mesa 1
            </p>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row" id="mesa1">
          <div class="col-md-12">
            <div class="row">
              <div class="col-md-12">
                <span class="legend_table">Disponível:</span>
                <span>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="InputStatus1"
                      value="n"
                      v-model="form.status"
                    />
                    <label class="form-check-label" for="exampleRadios1">
                      Não
                    </label>
                  </div>
                  <div class="form-check form-check-inline">
                    <input
                      class="form-check-input"
                      type="radio"
                      name="exampleRadios"
                      id="InputStatus2"
                      v-model="form.status"
                      value="y"
                    />
                    <label class="form-check-label" for="exampleRadios2">
                      Sim
                    </label>
                  </div>
                </span>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-12">
                <span class="legend_table">Pessoas:</span
                ><span class="legend_table">{{ form.count_peoples }} </span>
                <i
                  class="fas fa-2x fa-solid fa-minus-circle"
                  @click="minusPeoples($event)"
                ></i>
                <i
                  class="fas fa-2x fa-solid fa-plus-circle"
                  @click="addPeoples($event)"
                ></i>
              </div>
            </div>
            <br />
            <div class="row">
              <div class="col-md-12">
                <span class="legend_table">Comanda:</span>
                <button
                  class="btn btn-primary mb-2 btn-order-pad"
                  data-bs-toggle="modal"
                  data-bs-target="#exampleModal"
                  data-bs-whatever="@mdo"
                >
                  Abrir
                </button>

                <!-- Order Pad Modal -->

                <div
                  class="modal fade"
                  id="exampleModal"
                  tabindex="-1"
                  aria-labelledby="exampleModalLabel"
                  aria-hidden="true"
                >
                  <div class="modal-dialog modal-dialog-centered modal-lg">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">
                          Adicione os Produtos
                        </h5>
                        <button
                          type="button"
                          class="btn-close"
                          data-bs-dismiss="modal"
                          aria-label="Close"
                        ></button>
                      </div>
                      <div class="modal-body" id="app">
                        <form>
                          <label for="inputProduct">Produtos</label>
                          <div class="input-group selectProducts">
                            <div class="input-group-prepend">
                              <div class="input-group-text">
                                <i class="fas fa-light fa-plus-square"></i>
                              </div>
                            </div>
                            <select
                              id="inputProduct"
                              class="form-control"
                              v-model="form.aux"
                              name="txtProduct"
                            >
                              <option selected>Selecione o produto</option>
                              <option
                                v-for="item in products"
                                :key="item.id"
                                :value="[item.id, item.description, item.price]"
                              >
                                {{ item.description }}
                              </option>
                            </select>
                            <i
                              class="fas fa-2x fa-solid fa-cart-plus addProduct"
                              @click="add()"
                            ></i>

                            <table class="table">
                              <thead>
                                <tr>
                                  <th scope="col">Produto</th>
                                  <th scope="col">Quantidade</th>
                                  <th scope="col">Preço UN</th>
                                  <th scope="col">Preço Total</th>
                                  <th scope="col" align="center">Ação</th>
                                </tr>
                              </thead>
                              <tbody>
                                <tr
                                  v-for="item in this.form.list"
                                  :key="item.id"
                                  :value="item.id"
                                >
                                  <td>{{ item.description }}</td>
                                  <td>{{ item.count }}</td>
                                  <td>{{ item.price_unit }}</td>
                                  <td>{{ item.total_price }}</td>
                                  <td>
                                    <i
                                      class="fas fa-solid fa-minus-circle"
                                      @click="minusCountProd(item)"
                                    ></i>
                                    <i
                                      class="fas fa-solid fa-plus-circle"
                                      @click="addCountProd(item)"
                                    ></i>
                                    <i
                                      class="fas fa-solid fa-trash"
                                      @click="remove(item)"
                                    ></i>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </div>
                          <div class="modal-footer">
                            <h4 class="total_order_pad">Total: </h4><span>{{ this.form.total_order_pad }}</span>
                            <button
                              type="button"
                              class="btn btn-secondary"
                              data-bs-dismiss="modal"
                            >
                              Calcular
                            </button>
                            <button type="button" class="btn btn-primary">
                              Pagar
                            </button>
                          </div>
                        </form>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row topic-chart">
          <div class="col-md-4">
            <p class="title_table">
              <i class="fas fa-caret-down arrow_down2"></i>Mesa 2
            </p>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row" id="mesa2">
          <div class="col-md-12">Mesa 2</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row topic-chart">
          <div class="col-md-4">
            <p class="title_table">
              <i class="fas fa-caret-down arrow_down3"></i>Mesa 3
            </p>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row" id="mesa3">
          <div class="col-md-12">Mesa 3</div>
        </div>
      </div>
    </div>

    <br /><br /><br /><br /><br /><br /><br /><br />

    <div class="row">
      <div class="col-md-4">
        <div class="row topic-chart">
          <div class="col-md-4">
            <p class="title_table">
              <i class="fas fa-caret-down arrow_down4"></i>Mesa 4
            </p>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row" id="mesa4">
          <div class="col-md-12">Mesa 4</div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="row topic-chart">
          <div class="col-md-4">
            <p class="title_table">
              <i class="fas fa-caret-down arrow_down5"></i>Mesa 5
            </p>
          </div>
          <div class="col-md-4"></div>
          <div class="col-md-4"></div>
        </div>
        <div class="row" id="mesa5">
          <div class="col-md-12">Mesa 5</div>
        </div>
      </div>
    </div>
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
    tables: Array,
    products: Array,
  },

  data: () => {
    return {
      form: {
        id: null,
        number: null,
        status: null,
        count_peoples: null,
        total_order_pad: null,
        product: null,
        aux: null,
        product_request: {
          id: 0,
          description: null,
          count: null,
          price_unit: null,
          total_price: null
        },
        index: null,
        list: [],
      },
    };
  },

  created() {
    $(function () {
      $(".arrow_down1").click(function () {
        var table = $("#mesa1");
        table.slideToggle();
      });

      $(".arrow_down2").click(function () {
        var table = $("#mesa2");
        table.slideToggle();
      });

      $(".arrow_down3").click(function () {
        var table = $("#mesa3");
        table.slideToggle();
      });

      $(".arrow_down4").click(function () {
        var table = $("#mesa4");
        table.slideToggle();
      });

      $(".arrow_down5").click(function () {
        var table = $("#mesa5");
        table.slideToggle();
      });
    });
  },

  mounted() {
    const product_request = JSON.parse(localStorage.getItem("product_request"));
    this.list = product_request ? product_request : [];
  },

  methods: {

    addPeoples: function () {
      if (this.form.count_peoples < 4) {
        this.form.count_peoples++;
      }
    },

    minusPeoples: function () {
      if (this.form.count_peoples > 1) {
        this.form.count_peoples--;
      }
    },


    addCountProd: function (item) {
      if (this.form.product_request.count < 4) {        
        
        this.form.index = this.form.list.indexOf(item)
        this.form.product_request = Object.assign({}, item)
        this.form.product_request.count++


        this.form.product_request.total_price = (this.form.product_request.price_unit * this.form.product_request.count)
        this.form.list[this.form.index] = this.form.product_request;       

      }
    },

    minusCountProd: function (item) {
      if (this.form.product_request.count > 1) {
        this.form.index = this.form.list.indexOf(item)
        this.form.product_request = Object.assign({}, item)
        this.form.product_request.count--
        this.form.list[this.form.index] = this.form.product_request;
      }
    },



    add() {
      if (this.form.product_request.id === 0) {
        this.form.product_request.id = this.form.list.length + 1;
        this.form.product_request.id = this.form.aux[0]
        this.form.product_request.description = this.form.aux[1]
        this.form.product_request.price_unit = this.form.aux[2]
        this.form.list.push(this.form.product_request);
      }

      this.form.product_request = { id: 0, description: null, count: null, price: null };

    },

    remove(item) {
      const idx = this.list.indexOf(item);
      this.list.splice(idx, 1);
      localStorage.setItem("product_request", JSON.stringify(this.list));
    },

  },
};
</script>
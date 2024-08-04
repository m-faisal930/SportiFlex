<?php
include('./connection/connect.php');
?>




<div id="mySearch" class="modal fade">
      <div class="modal-dialog modal-login">
        <div class="modal-content">
          <div class="modal-header">
            <h4 id="login-title" class="modal-title">Enter Product Keryword</h4>
            <button href="index" type="button" class="close">
              <a href="/index"
                ><i class="fas fa-thin fa-square-xmark fa-2xl"></i
              ></a>
            </button>

          </div>
          <div class="modal-body">

            <form id="search" action="./search_result" method="get">
              <div class="form-group">
                <div class="input-group">
                  <span class="input-group-addon"
                    ><i class="fa-solid fa-magnifying-glass"></i></span>
                  <input
                    type="text"
                    name="text"
                    class="form-control"
                    placeholder="Search Product Here"
                    required="required"
                  />
                </div>
              </div>

              <div class="form-group">
                <button type="submit" name="submit_search" class="btn btn-primary btn-block btn-lg">
                  Search Now
                </button>
              </div>
              <!-- <button id="register-button"   class="btn-link ">Sign Up</button> -->
            </form>

          </div>
        </div>
      </div>
    </div>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title></title>
    </head>
    <body>
      <section class="text-center">
        <!-- Background image -->
        <div class="p-5 bg-image" style="
              background-image: url('https://mdbootstrap.com/img/new/textures/full/171.jpg');
              height: 300px;
              "></div>
        <!-- Background image -->
      
        <div class="card mx-4 mx-md-5 shadow-5-strong" style="
              margin-top: -100px;
              background: hsla(0, 0%, 100%, 0.8);
              backdrop-filter: blur(30px);
              ">
          <div class="card-body py-5 px-md-5">
      
            <div class="row d-flex justify-content-center">
              <div class="col-lg-8">
                <h2 class="fw-bold mb-5">Sign up now</h2>
                <form>
                  <!-- 2 column grid layout with text inputs for the username and role -->
                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="username" name="username" id="typeUsername" class="form-control" />
                        <label class="form-label" for="typeUsername">Username</label>
                      </div>
                    </div>
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="role" name="role" id="typeRole" class="form-control" />
                        <label class="form-label" for="typeRole">Role</label>
                      </div>
                    </div>
                  </div>
      
                  <!-- Email input -->
                  <div class="form-outline mb-4">
                    <input type="email" name="email" id="typeEmail" class="form-control" />
                    <label class="form-label" for="typeEmail">Email</label>
                  </div>
      
                  <!-- Password input -->
                  <div class="form-outline mb-4">
                    <input type="password" name="password" id="typePassword" class="form-control" />
                    <label class="form-label" for="typePassword">Password</label>
                  </div>

      
                  <!-- Submit button -->
                  <button type="submit" name="register" value="Register" class="btn btn-primary btn-block mb-4">
                    Register
                  </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </body>
</html>
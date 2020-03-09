<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Validation, Sanitization, and Normalization</title>
  </head>

  <body>
    <div>
      <header>
        <h1>Validation, Sanitization, and Normalization</h1>
        <p>Stopping your user from screwing up your application...</p>
        <hr>
        <p>
          <strong>Validation</strong> tells you if the data is valid.
          <br><strong>Sanitization</strong> ensures the data is pure.
          <br><strong>Normalization</strong> guarantees the data is in the right format.
        </p>
      </header>

      <section>
        <form action="./insert.php" method="post">
          <div>
            <div>
              <div>
                <label for="first_name">First Name:</label>
                <input type="text" name="first_name" required placeholder="Herman">
              </div>
            </div>
            <div>
              <div>
                <label for="last_name">Last Name:</label>
                <input type="text" name="last_name" required placeholder="Munster">
              </div>
            </div>
          </div>

          <div>
            <div>
              <div>
                <label for="email">Email:</label>
                <input type="email" name="email" placeholder="herman.munster@mockingbird.com" required>
              </div>
            </div>

            <div>
              <div>
                <label for="tel">Phone:</label>
                <div>
                  <div>
                    <input type="tel" name="country_code" placeholder="+1" required>
                  </div>

                  <div>
                    <input type="tel" name="area_code" placeholder="555" required>
                  </div>

                  <div>
                    <input type="tel" name="phone_number" placeholder="555-5555" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <div>
              <div>
                <label for="address_1">Address Line 1:</label>
                <input type="text" name="address_1" placeholder="1313 Mockingbird Lane" required>
              </div>

              <div>
                <label for="address_2">Address Line 2:</label>
                <input type="text" name="address_2" placeholder="Unit #42">
              </div>
            </div>

            <div>
              <div>
                <div>
                  <div>
                    <label for="city">City:</label>
                    <input type="text" name="city" placeholder="Mockingbird Heights" required>
                  </div>
                </div>

                <div>
                  <div>
                    <label for="province">Province/State:</label>
                    <input type="text" name="province" placeholder="California" required>
                  </div>
                </div>
              </div>

              <div>
                <div>
                  <div>
                    <label for="country">Country:</label>
                    <input type="text" name="country" placeholder="United States" required>
                  </div>
                </div>

                <div>
                  <div>
                    <label for="postal_code">Postal/Zip Code:</label>
                    <input type="text" name="postal_code" placeholder="13131" required>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div>
            <input type="checkbox" name="opt_in" value="yes">
            <label for="opt_in">Subscribe to our newsletter?</label>
          </div>

          <button type="submit">Sign Up</button>
          <button type="reset">Reset</button>
        </form>
      </section>
    </div>
  </body>
</html>
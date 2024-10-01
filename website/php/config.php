<?php
  define('DB_SERVER', 'localhost');
  define('DB_USERNAME', 'desarsgr_admin');
  define('DB_PASSWORD', 'Des@rs_plants2020');
  define('DB_DATABASE', 'desarsgr_database');

  // define('STRIPE_API_KEY','sk_test_51HqyCrKwAF1CoMCNwMFe5dhAZkFOzgpqElNesyQA8yw4CxXnvbN5HYWCs3pboB3xFFZUvaLKAOwCgRdhW8Z9oGrR00ovXI8J1p');
  // define('STRIPE_PUBLISHABLE_KEY','pk_test_51HqyCrKwAF1CoMCNrZcMNCarB7bhEHbqBHXiPZ9FMicV2DJP5BA10vjY4nJsT0nlsfOWiIxPHPOfh49ARhnuO4Ma0083dN3bFa');

  define('STRIPE_API_KEY','sk_test_51MikuWFdI4JsYFXpbdU0VreQOsAlvr5sN1MAJqyAUMg1Arpwq9lUuO9jWmpIyihrjm9LHF5XnY2h5HHQXe77ohyP00LqKR37WF');
  define('STRIPE_PUBLISHABLE_KEY','pk_test_51MikuWFdI4JsYFXpWAbWUO4jvGxpW0JC5zFpZcgC6BDJujjuFXKEunYIG2nk3KkfzsFMiN2d65PX6rHbIHENpmmr00YQxLdWhS');

  //define('STRIPE_API_KEY','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');
  //define('STRIPE_PUBLISHABLE_KEY','pk_live_51I6SpeEngZIeK7CjUC1dRMdHKqV0JZccGFLbsVKqIiTshFdCzgQuWouQljFTSzfPz8e1XmzDMS41k1ayF4SwFwKs00VaL5dckL');

  define('STRIPE_SUCESS_URL','http://desarsgreenhands.com/receipt.php');
  define('STRIPE_CANCEL_URL','http://desarsgreenhands.com/canceled.php');

  $db = mysqli_connect(DB_SERVER,DB_USERNAME,DB_PASSWORD,DB_DATABASE);
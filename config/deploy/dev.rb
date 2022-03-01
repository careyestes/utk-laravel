role :app, %w{webteam@seinfeld.ws.utk.edu}
 
set :ssh_options, {
    auth_methods: %w(password),
    password: "feyn-ij-hat"
}
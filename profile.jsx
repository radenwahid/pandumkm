type Profile struct {
  Name string
  Email string
  // other fields
}
func main() {

  profile := Profile{"John Doe", "john@email.com"}

  win := ui.NewWindow("Profile", 800, 600)

  nameLabel := widget.NewLabel("Name: ")
  nameValue := widget.NewLabel(profile.Name)

  emailLabel := widget.NewLabel("Email: ")  
  emailValue := widget.NewLabel(profile.Email)

  // add widgets to window
  win.SetChild(nameLabel)
  win.SetChild(nameValue)
  win.SetChild(emailLabel) 
  win.SetChild(emailValue)

  win.OnClosing(func(*ui.Window) {
    ui.Quit()
  })

  ui.Main()
}

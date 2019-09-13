from selenium import webdriver
from PIL import Image
import time

# SETUP VARIABLES (Enter your Data)
LinkedInUrl = "https://www.linkedin.com/company/google/" # URL of wanted Feed
EMail = "" # Your LinkedIn-Account Login E-Mail
Password = "" # Your LinkedIn Password
count = 30 # how many feed post should be loaded?
internetSleep = 2 # If your grey pictures (not loaded), set this variable higher
folder = "column1" # Folder of the generated pictures

# FireFox init
driver = webdriver.Firefox()
driver.maximize_window()

# open LinkedIn
driver.get('https://www.linkedin.com/company/intel-corporation/')

# LOGIN
driver.get('https://www.linkedin.com/uas/login?trk=nav_header_signin')

# enter E-Mail
email_field = driver.find_element_by_id('username')
email_field.send_keys(EMail)

# enter Password
password_field = driver.find_element_by_id('password')
password_field.send_keys(Password)

# Submit
password_field.submit()

time.sleep(5)

# Open Feed
driver.get(LinkedInUrl)

# Scroll Down and Load Content
i_scroll = 0
while i_scroll < count:
    driver.execute_script("window.scrollTo(0, document.body.scrollHeight);")
    time.sleep(3)
    i_scroll = i_scroll + 1

# Scroll Down and Capture Content
feedelements = driver.find_elements_by_class_name('occludable-update') # Find Feed Posts

i_posts = 0
for feedpost in feedelements:
    if i_posts + 1 > count:
        break
    # Get Location
    location = feedpost.location
    size = feedpost.size

    # Scroll to Location
    driver.execute_script("window.scrollTo(0, "+ str(location['y']-52) +");")

    # Get New Location
    location = feedpost.location
    size = feedpost.size

    # Wait for slow Internet
    time.sleep(internetSleep)

    # Save Screenshot
    driver.save_screenshot("image_temp.png")

    # Size Screenshot
    x = location['x']
    y = 52
    width = location['x']+size['width']
    height = 52+size['height']

    # Corp Screenshot
    im = Image.open('image_temp.png')
    im = im.crop((int(x), int(y), int(width), int(height)))
    im.save(folder + '/post'+ str(i_posts) +'.png')

    i_posts = i_posts + 1

driver.quit()

#importing required python packages
from selenium import webdriver
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.webdriver.common.action_chains import ActionChains 
import time
import random
from webdriver_manager.chrome import ChromeDriverManager
import undetected_chromedriver as uc


username= 'pon_tu_gmail_aqui \n'
password= 'pon_tu_clave_aqui\n'

chrome_options = uc.ChromeOptions()
chrome_options.add_argument('--headless')
driver = uc.Chrome(options=chrome_options)
driver.get('https://accounts.google.com/')
enter_username = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'identifier')))
enter_username.send_keys(username)
time.sleep(random.randint(1,4))
   
enter_password = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'Passwd')))
enter_password.send_keys(password)
time.sleep(random.randint(1,4))

try:
  	actions = ActionChains(driver)
  	actions.click(a)
  	actions.perform()
except:
   	pass
   
finally:
	for i in range(20000): #Number of views
            driver.get("https://www.youtube.com/watch?v=") #viewer link
            time.sleep(random.randint(45,70))

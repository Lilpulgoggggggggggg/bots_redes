import os
os.system('pip install requests undetected_chromedriver webdriver_manager selenium')
os.system('clear')
os.system('cls')
from selenium.common.exceptions import WebDriverException
from selenium.webdriver.support.wait import WebDriverWait
from selenium.webdriver.common.keys import Keys
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.common.by import By 
from selenium.webdriver.support import expected_conditions as EC 
from selenium.webdriver.common.action_chains import ActionChains 
import time
import random
from webdriver_manager.chrome import ChromeDriverManager
import undetected_chromedriver as uc
import requests





info = {}

print("loading...")
time.sleep(3)
os.system('cls')
views = int(input("enter no. of views: "))
time.sleep(0)
os.system('cls')
username = (input("enter youtube url: "))
time.sleep(0)
os.system('cls')
print("loading...")
time.sleep(3)
os.system('cls')







for i in range(views):
        chrome_options = uc.ChromeOptions()
        proxy = '72.167.52.91:8887'
        chrome_options.add_argument('--headless')
        chrome_options.add_argument('--proxy-server='+str(proxy))
        driver.get("https://tolinay.com/youtube-izlenme-hilesi")
        print("your page is loading your link please wait...")
        time.sleep(4)
        os.system('cls')
        enter_username = WebDriverWait(driver,20).until(EC.presence_of_element_located((By.NAME, 'servis_veri')))
        enter_username.send_keys(username + '\n')
        print("your link is successful put...")
        time.sleep(4)
        os.system('cls')
        print("thanks your youtube link is successful loading...")
        time.sleep(4)
        os.system('cls')
        print("Your site is on status load please wait for the likes successful...")
        time.sleep(700)
        os.system('cls')
        print("Your views is successful sent...")
        time.sleep(4)
        os.system('cls')
        print("reloading page...")
        time.sleep(4)
        os.system('cls')
        driver.quit()
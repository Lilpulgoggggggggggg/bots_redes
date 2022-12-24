import undetected_chromedriver as uc
from selenium.webdriver.common.by import By
from selenium.webdriver.support.ui import WebDriverWait
from selenium.webdriver.support import expected_conditions as EC
import time

email = 'pon_tu_gmail_aqui \n'    #enter mail
password = 'pon_tu_clave_aqui\n'         #enter pass

driver = uc.Chrome(use_subprocess=True)
wait = WebDriverWait(driver, 20)
url = 'https://accounts.google.com/'
driver.get(url)

wait.until(EC.visibility_of_element_located((By.NAME,'identifier'))).send_keys(email)
wait.until(EC.visibility_of_element_located((By.NAME,'Passwd'))).send_keys(password)
time.sleep(2)

#upto the above the codes credits goes to https://github.com/xtekky these man

with open("urls.txt") as f: #change url in text file
    for url in f:
        driver.get(url)
        
time.sleep(65)
#if video dont have ads then change 8 to 3 or 4       
#i here added upto 1o+ auto like and sub if you want more means copy line from 216 to 237 and paste in 239line and dont forgot to replace mail and password....
#if you only want auto like and dont want auto subscribers means remove the line
#these where you find in the script driver.find_element_by_xpath('/html/body/ytd-app/div[1]/ytd-page-manager/ytd-watch-flexy/div[5]/div[1]/div/div[2]/ytd-watch-metadata/div/div[2]/div[1]/div/ytd-subscribe-button-renderer/yt-button-shape/button/yt-touch-feedback-shape/div/div[2]').click() which contain subscribe xpath..

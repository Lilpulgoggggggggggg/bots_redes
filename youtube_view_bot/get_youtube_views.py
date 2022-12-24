from time import sleep
import sys
sys.path.append(r'./')
from init import *
from selenium.webdriver.support import expected_conditions as EC
from selenium.webdriver.support.ui import WebDriverWait

username = input('What is your link youtube?\n')
print('Getting views... Please do not terminate the program.')

class Instagram:
    def setup(self):
        Setup.init(self)

    def go_to_website(self):
        sleep(4)
        self.browser.get('https://tolinay.com/youtube-izlenme-hilesi')
        sleep(4)

        uid = self.browser.find_element(By.XPATH, '/html/body/div[2]/div[2]/div[2]/form/div/div[1]/input')
        uid.send_keys(username)
        sleep(2)

        button = self.browser.find_element(By.XPATH, '/html/body/div[2]/div[2]/div[2]/form/div/div[3]/button')
        button.click()

        element_present = EC.presence_of_element_located((By.XPATH, '/html/body/div[2]/div[2]/div[1]/div/div/div[1]/div'))
        WebDriverWait(self.browser, 20).until(element_present)

        if("Başarıyla Gönderildi" in self.browser.page_source):
            print(f"\n10 Views Get For you you!")
            self.browser.save_screenshot('followed.png')
        elif("Çok Hızlı İşlem Yapıyorsunuz" in self.browser.page_source):
            print(f"\nError! Do not run the program fast mode!")
            self.browser.save_screenshot('error.png')
        else:
            print(f"\nError! Your credits have been expired! Please change your Instagram username.")
            self.browser.save_screenshot('error.png')

    def close_browser(self):
        Setup.close_browser(self)

ig = Instagram()
while(True):
    ig.setup()
    ig.go_to_website()
    ig.close_browser()

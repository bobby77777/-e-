import yfinance as yf
import matplotlib.pyplot as plt
import seaborn
import time
import pandas as pd
from datetime import date
import sys

# labels = 'a', 'b'
# size = [30, 60]

total_cost = sys.argv[1]
total_gain = sys.argv[2]

labels = 'total_cost', 'total_gain'
size = [total_cost, total_gain]
# print(total_cost, total_gain)
plt.pie(size, labels=labels, autopct='%1.1f%%')
plt.rcParams["figure.figsize"] = (0.5, 0.5)
plt.title("gain_rate")
plt.savefig("pie_chart.png", dpi=100)
# plt.show()
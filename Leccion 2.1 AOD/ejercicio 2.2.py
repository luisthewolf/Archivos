f = open("poem.txt", "r")

print("1:" , f.read(4))
print("2:" , f.readline())
print("3:" , f.readline())
print("4:" , f.readline())
print("5:" , f.readline())
print("6:" , f.readline())
f.close()